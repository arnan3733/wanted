<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Division;

class CreateDivisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $division = [
            [
                'divisions_id' => '0001',
                'divisions_name' => 'กองปราบปรามการทุจริตในภาครัฐ 1',
                'divisions_shortname' => 'กปท. 1'
            ],
            [
                'divisions_id' => '0002',
                'divisions_name' => 'กองปราบปรามการทุจริตในภาครัฐ 2',
                'divisions_shortname' => 'กปท. 2'
            ],
            [
                'divisions_id' => '0003',
                'divisions_name' => 'กองปราบปรามการทุจริตในภาครัฐ 3',
                'divisions_shortname' => 'กปท. 3'
            ]
        ];

        foreach($division as $key => $value){
            Division::create($value);
        }
    }
}
