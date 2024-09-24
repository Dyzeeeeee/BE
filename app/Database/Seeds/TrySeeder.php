<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TrySeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'title' => 'Example Title 1',
                'description' => 'Example description 1',
            ],
            [
                'title' => 'Example Title 2',
                'description' => 'Example description 2',
            ],
            [
                'title' => 'Example Title 3',
                'description' => 'Example description 3',
            ],
            [
                'title' => 'Example Title 4',
                'description' => 'Example description 4',
            ],
        ];

        // Using Query Builder's insertBatch method to insert multiple rows at once
        $this->db->table('try')->insertBatch($data);
    }
}
