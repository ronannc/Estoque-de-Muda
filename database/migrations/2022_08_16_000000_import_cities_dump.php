<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class ImportCitiesDump extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared( file_get_contents( 'database/migrations/cities.sql' ) );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::drop('cities');
        //Schema::drop('regions');
        //Schema::drop('states');
        //Schema::drop('state_capitals');

    }
}
