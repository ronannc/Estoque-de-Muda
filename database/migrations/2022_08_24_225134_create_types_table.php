<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string( 'name' );
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table( 'inventories', function ( Blueprint $table ) {
            $table->unsignedBigInteger( 'type_id' )->nullable();
            $table->foreign( 'type_id' )->references( 'id' )->on( 'types' );
        } );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('types');
    }
}
