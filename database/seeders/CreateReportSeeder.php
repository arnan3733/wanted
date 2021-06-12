<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CreateReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $report = [
            [
                'divisions_id'=> '',
                'wanted_number'=> '',
                'accused_name'=> '',
                'accused_id_card'=> '',
                'allegates_id'=> '',
                'court_office'=> '',
                'prosecutor_office'=> '',
                'date_issue'=> '',
                'expiration_date'=> '',
                'expiration_type'=> '',
                'case_id'=>'',
                'assignment_number'=> '',
                'authority_name'=> '',
                'authority_contact'=> '',
                'attachment_file'=> '',
            ], 
        ];

    foreach($allegates as $key => $value){
        Allegate::create($value);
    }
    }
}
