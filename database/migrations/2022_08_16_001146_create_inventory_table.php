<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInventoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'inventory', function ( Blueprint $table ) {
            $table->id();
            $table->integer( 'quantity' );
            $table->string( 'type' );
            $table->unsignedBigInteger( 'specie_id' );
            $table->foreign( 'specie_id' )->references( 'id' )->on( 'species' );
            $table->unsignedBigInteger( 'nursery_id' );
            $table->foreign( 'nursery_id' )->references( 'id' )->on( 'nurseries' );
            $table->date( 'date' );
            $table->string( 'observation' )->nullable();
            $table->string( 'responsible' )->nullable();
            $table->string( 'destiny' )->nullable();
            $table->softDeletes();
            $table->timestamps();
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists( 'inventory' );
    }
}
