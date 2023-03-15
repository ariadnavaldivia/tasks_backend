<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('tasks')->insert([
            'name' => 'Meeting with Mr. Rojas',
            'description' => 'We have to meet with Mr Rojas to present the new project for the restaurant app. He wants to finish the next month. We have to plan next weeks.',
            'limit_date' => '2023-03-08',
            'completed' => 1
        ]);

        DB::table('tasks')->insert([
            'name' => 'Meeting with Mr. Buckland',
            'description' => 'We have to meet with Mr. Buckland to introduce the new demo for the taxi app. This time including the desktop panel for the administration area. They need to test with real drivers this time, and to give them a quick guide to use the app.',
            'limit_date' => '2023-03-08',
            'completed' => 1
        ]);

        DB::table('tasks')->insert([
            'name' => 'Visit Mrs. Watson',
            'description' => 'We have to meet with Mr Watson to fix the problem from last week. The server went down for 2 hours. She asked us to give her a solution as soon as possible.',
            'limit_date' => '2023-03-10',
            'completed' => 0
        ]);

        DB::table('tasks')->insert([
            'name' => 'Meeting with Mrs. McAddams',
            'description' => 'We have to visit Mrs. McAddams to recollect all her ideas for the new project.
            She wants a mobile application to manage the school, with access to information of the students,
            teachers and parents',
            'limit_date' => '2023-03-12',
            'completed' => 0
        ]);

        DB::table('tasks')->insert([
            'name' => 'Meeting with Mrs. Salazar',
            'description' => 'Discuss the changes to the project. She needs to add a new module to the Hospital Project.
            They need to manage the payments inside the application so they can have easy access. They want to use
            Visanet or Niubiz',
            'limit_date' => '2023-03-15',
            'completed' => 0
        ]);

    }
}
