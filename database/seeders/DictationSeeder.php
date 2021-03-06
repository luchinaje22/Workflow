<?php

namespace Database\Seeders;

use App\Models\Dictation;
use Illuminate\Database\Seeder;

class DictationSeeder extends Seeder
{

    public function run()
    {

        Dictation::create([
            'date' => '2022-07-02',
            'time' => '09:00',
            'stock' => 3,
            'course_id' => 1,
            'place_id' => 1
        ]);

        Dictation::create([
            'date' => '2022-07-03',
            'time' => '09:00',
            'stock' => 1,
            'course_id' => 1,
            'place_id' => 1
        ]);
        Dictation::create([
            'date' => '2022-07-19',
            'time' => '09:00',
            'stock' => 30,
            'course_id' => 1,
            'place_id' => 2
        ]);

        Dictation::create([
            'date' => '2022-08-26',
            'time' => '09:00',
            'stock' => 30,
            'course_id' => 1,
            'place_id' => 1
        ]);



 /*

        Dictation::create([
            'date' => '2021-06-10',
            'time' => '09:00',
            'stock' => 1,
            'status' => 'completo',

            'course_id' => 1,
            'place_id' => 2

        ]);
        Dictation::create([
            'date' => '2021-06-17',
            'time' => '09:00',
            'stock' => '25',
            'status' => 'activo',

            'course_id' => 1,
            'place_id' => 2

        ]);

        Dictation::create([
            'date' => '2021-06-24',
            'time' => '09:00',
            'stock' => '25',
            'status' => 'activo',

            'course_id' => 1,
            'place_id' => 1
        ]);

*/
    }
}

