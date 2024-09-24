<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class RecipeSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'menu_id' => 1, // Assuming menu item ID 1 exists
                'foodstock_id' => 2, // Assuming foodstock item ID 2 exists
                'quantity' => 'Strawberries: 100g, Ice Cream: 50g, Sugar: 20g, Milk: 100ml',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'menu_id' => 3, // Assuming menu item ID 3 exists
                'foodstock_id' => 5, // Assuming foodstock item ID 5 exists
                'quantity' => 'Coffee: 200ml, Ice Cream: 50g, Sugar: 10g, Ice: 50g',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            // More recipes can be added in the same format
        ];

        // Using Query Builder to insert data
        $this->db->table('recipes')->insertBatch($data);
    }
}