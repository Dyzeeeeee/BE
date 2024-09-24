<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['name' => 'Cold Drinks'],
            ['name' => 'Alcoholic Drinks'],
            ['name' => 'Mixed Cocktails'],
            ['name' => 'Hot Drinks'],
            ['name' => 'Boodle Bundles'],
            ['name' => 'Seafoods'], 
            ['name' => 'Noodles'],
            ['name' => 'Shrimp Squid'],
            ['name' => 'Sizzling Plates'],
            ['name' => 'Pork'],
            ['name' => 'Pork'],// You can add as many categories as needed
            ['name' => 'Chicken'],
            ['name' => 'Appetizers'],
            ['name' => 'Breakfast'],
            ['name' => 'Sandwiches'],
            ['name' => 'Solo Plated'],
            ['name' => 'Rice'],
        ];

        // Simple Query
        // $this->db->table('categories')->insert($data);

        // Batch Query (recommended for multiple inserts)
        $this->db->table('categories')->insertBatch($data);
    }
}