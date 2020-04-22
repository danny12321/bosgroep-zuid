<?php

use Illuminate\Database\Seeder;

class MunicipalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('municipalities')->insert([
            'name' => "Horst",
            'slug' => "horst",
            'lat' => 51.4503945,
            'long' => 6.0514924,
        ]);

        DB::table('municipalities')->insert([
            'name' => "Weert",
            'slug' => "weert",
            'lat' => 51.2439415,
            'long' => 5.7142222,
        ]);

        DB::table('municipalities')->insert([
            'name' => "Den Haag",
            'slug' => "denhaag",
            'lat' => 52.0704978,
            'long' => 4.3006999,
        ]);
        
        DB::table('municipalities')->insert([
            'name' => "Tilburg",
            'slug' => "tilburg",
            'lat' => 51.560596,
            'long' => 5.0919143,
        ]);
    }
}
