<?php

use Illuminate\Database\Seeder;
use App\Selection;

class SelectionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Selection::create([
            'name' => 'Folder 1',
            'municipality_id' => 1
        ]);

        Selection::create([
            'name' => 'Insecten',
            'layer_id' => 2,
            'parent_id' => 1,
            'municipality_id' => 1
        ]);

        Selection::create([
            'name' => 'Insect',
            'layer_id' => 1,
            'municipality_id' => 1
        ]);
    }
}
