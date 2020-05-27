<?php

use Illuminate\Database\Seeder;

class HomePagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('home_pages')->insert([
            'homeText' => "Horst",
            'homeImage' => "",
            'url_geoserver' => "http://gmd.has.nl:8080/geoserver/biodiversiteithorst/wms",
        ]);
    }
}
