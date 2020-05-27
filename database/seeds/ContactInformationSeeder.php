<?php

use Illuminate\Database\Seeder;

class ContactInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('contacts')->insert([
            'address' => "",
            'showEmail' => "",
            'feedbackEmail' => "",
            'phonenumber' => "",
            'feedbackEmail' => "",
            'faxnumber' => "",
        ]);
    }
}
