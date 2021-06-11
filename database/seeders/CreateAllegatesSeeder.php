<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Allegate;

class CreateAllegatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $allegates = [
            [
                'allegates_id' => '001',
                'allegates_name' => 'เจ้าพนักงาน เรียกรับฯ',
                'allegates_detail' => 'เจ้าพนักงาน เรียกรับฯ'
            ],
            [
                'allegates_id' => '002',
                'allegates_name' => 'ปฏิบัติหน้าที่โดยมิชอบ',
                'allegates_detail' => 'ปฏิบัติหน้าที่โดยมิชอบ'
            ],
            [
                'allegates_id' => '003',
                'allegates_name' => 'ร่วมกันกระทำความผิด ปลอมแปลงเอกสาร',
                'allegates_detail' => 'ร่วมกันกระทำความผิด ปลอมแปลงเอกสาร'
            ]
        ];

        foreach($allegates as $key => $value){
            Allegate::create($value);
        }
    }
}
