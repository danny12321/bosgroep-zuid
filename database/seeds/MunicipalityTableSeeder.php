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
            'legend' => "http://gmd.has.nl:8080/geoserver/biodiversiteithorst/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&STRICT=false&style=biodiversiteithorst:StijlStressfactoren&legend_options=dx:5;&TRANSPARENT=true",
            'slug' => "horst",
            'lat' => 51.4503945,
            'long' => 6.0514924,
        ]);

        DB::table('municipalities')->insert([
            'name' => "Weert",
            'legend' => "http://gmd.has.nl:8080/geoserver/biodiversiteithorst/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&STRICT=false&style=biodiversiteithorst:StijlStressfactoren&legend_options=dx:5;&TRANSPARENT=true",
            'slug' => "weert",
            'lat' => 51.2439415,
            'long' => 5.7142222,
        ]);

        DB::table('municipalities')->insert([
            'name' => "Den Haag",
            'legend' => "http://gmd.has.nl:8080/geoserver/biodiversiteithorst/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&STRICT=false&style=biodiversiteithorst:StijlStressfactoren&legend_options=dx:5;&TRANSPARENT=true",
            'slug' => "denhaag",
            'lat' => 52.0704978,
            'long' => 4.3006999,
        ]);
        
        DB::table('municipalities')->insert([
            'name' => "Tilburg",
            'legend' => "http://gmd.has.nl:8080/geoserver/biodiversiteithorst/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&STRICT=false&style=biodiversiteithorst:StijlStressfactoren&legend_options=dx:5;&TRANSPARENT=true",
            'slug' => "tilburg",
            'lat' => 51.560596,
            'long' => 5.0919143,
        ]);
    }
}
