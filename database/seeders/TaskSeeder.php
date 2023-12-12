<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'name' => 'Create a new project plan -1',
                'user_id' => 2,
                'description' => 'Develop a detailed project plan outlining the tasks, timelines, and resources required for the upcoming website redesign project.',
                'assignment_date' => now(),
                'deadline' => '2023-12-15',
                'status' => 'pending',
            ],
            [
                'name' => 'Create a new project plan -2',
                'user_id' => 2,
                'description' => 'Develop a detailed project plan outlining the tasks, timelines, and resources required for the upcoming website redesign project.',
                'assignment_date' => now(),
                'deadline' => '2023-12-15',
                'status' => 'in_progress',
            ],    [
                'name' => 'Create a new project plan-3',
                'user_id' => 2,
                'description' => 'Develop a detailed project plan outlining the tasks, timelines, and resources required for the upcoming website redesign project.',
                'assignment_date' => now(),
                'deadline' => '2023-12-15',
                'status' => 'completed',
            ],
        ]);
    }
}
