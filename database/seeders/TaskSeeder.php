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
            'description' => 'We have to meet with Mr Rojas to present the new project',
            'limit_date' => '2023-03-08',
            'completed' => 1
        ]);

        DB::table('tasks')->insert([
            'name' => 'Meeting with Mrs. Watson',
            'description' => 'We have to meet with Mr Granger to talk about the project',
            'limit_date' => '2023-03-10',
            'completed' => 0
        ]);

        DB::table('tasks')->insert([
            'name' => 'Meeting with Mrs. McAddams',
            'description' => 'We have to meet with Mr Granger to talk about the project',
            'limit_date' => '2023-03-12',
            'completed' => 0
        ]);

        DB::table('tasks')->insert([
            'name' => 'Meeting with Mrs. Salazar',
            'description' => 'Discuss the changes to the project',
            'limit_date' => '2023-03-15',
            'completed' => 0
        ]);

    }
}
