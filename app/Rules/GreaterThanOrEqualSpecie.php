<?php

namespace App\Rules;

use App\Models\Inventory;
use App\Models\Specie;
use App\Service\SpecieService;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Validation\Rules\In;

class GreaterThanOrEqualSpecie implements Rule
{
    protected $specie_id;
    protected $type;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct( $specie_id, $type )
    {
        $this->specie_id = $specie_id;
        $this->type = $type;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes( $attribute, $value )
    {
        if($this->type == Inventory::STORE)
            return true;

        $inventory = Specie::find( $this->specie_id )->inventories;
        $sumStore = $inventory->where( 'type', Inventory::STORE )->sum( 'quantity' );
        $sumExit  = $inventory->where( 'type', Inventory::EXIT )->sum( 'quantity' );
        $quantity = $sumStore - $sumExit;

        return $value <= $quantity;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Quantidade de espécie insuficiente.';
    }
}
