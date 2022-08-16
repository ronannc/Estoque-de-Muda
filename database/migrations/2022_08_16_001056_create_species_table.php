<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpeciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create( 'species', function ( Blueprint $table ) {
            $table->id();
            $table->string( 'name' );
            $table->string( 'specie' )->nullable();
            $table->unsignedBigInteger( 'nursery_id' );
            $table->foreign( 'nursery_id' )->references( 'id' )->on( 'nurseries' );
            $table->unsignedBigInteger( 'group_id' );
            $table->foreign( 'group_id' )->references( 'id' )->on( 'groups' );
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
        Schema::dropIfExists( 'species' );
    }
}
