<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNurseriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'nurseries', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'name' );
            $table->integer( 'city_id' )->nullable();
            $table->foreign( 'city_id' )->references( 'id' )->on( 'cities' );
            $table->string( 'address' )->nullable();
            $table->string( 'number' )->nullable();
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
        Schema::dropIfExists( 'nursery' );
    }
}
