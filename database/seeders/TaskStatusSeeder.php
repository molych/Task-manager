<?php

namespace Database\Seeders;

use App\Models\TaskStatus;
use Illuminate\Database\Seeder;

class TaskStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taskStatuses = [
            "New",
            "In progress",
            "In testing",
            "Complited"
        ];
        foreach($taskStatuses as $status) {
            $taskStatus = new TaskStatus();
            $taskStatus->name = $status;
            $taskStatus->save(); 
        }
       
    }
}
