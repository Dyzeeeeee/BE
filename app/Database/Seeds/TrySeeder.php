<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TrySeeder extends Seeder
{
    public function run()
    {
        $data = [
            'title' => 'Example Title',
            'description' => 'Example description',
        ];

        // Simple Queries
        $this->db->table('try')->insert($data);

        // Using Query Builder
        // $this->db->table('try')->insertBatch([$data]);
    }

}
