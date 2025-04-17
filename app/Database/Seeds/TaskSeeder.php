<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TaskSeeder extends Seeder
{
    public function run()
    {
        // create 10 tasks
        $tasks = [
            [
                'id_user' => 1,
                'task_name' => 'Task 1',
                'task_description' => 'Description of Task 1',
                'task_status' => 'new',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'id_user' => 2,
                'task_name' => 'Task 2',
                'task_description' => 'Description of Task 2',
                'task_status' => 'new',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'id_user' => 3,
                'task_name' => 'Task 3',
                'task_description' => 'Description of Task 3',
                'task_status' => 'new',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'id_user' => 1,
                'task_name' => 'Task 4',
                'task_description' => 'Description of Task 4',
                'task_status' => 'new',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'id_user' => 2,
                'task_name' => 'Task 5',
                'task_description' => 'Description of Task 5',
                'task_status' => 'new',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'id_user' => 3,
                'task_name' => 'Task 6',
                'task_description' => 'Description of Task 6',
                'task_status' => 'new',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'id_user' => 1,
                'task_name' => 'Task 7',
                'task_description' => 'Description of Task 7',
                'task_status' => 'new',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'id_user' => 2,
                'task_name' => 'Task 8',
                'task_description' => 'Description of Task 8',
                'task_status' => 'new',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'id_user' => 3,
                'task_name' => 'Task 9',
                'task_description' => 'Description of Task 9',
                'task_status' => 'new',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ],
            [
                'id_user' => 1,
                'task_name' => 'Task 10',
                'task_description' => 'Description of Task 10',
                'task_status' => 'new',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'deleted_at' => null,
            ]
        ];
        // insert all tasks
        $this->db->table('tasks')->insertBatch($tasks);
    }
}
