<?php

use Illuminate\Database\Seeder;
use App\Layer;

class LayersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Layer::create([
            'title' => 'Alle_insecten_soortenrijkdom',
            'name' => 'biodiversiteithorst:Alle_insecten_soortenrijkdom',
        ]);
        
        Layer::create([
            'title' => 'Alle_insecten_std',
            'name' => 'biodiversiteithorst:Alle_insecten_std',
        ]);
    }
}
