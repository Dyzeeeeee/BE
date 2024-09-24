<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class FoodStockSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'ingredient_name' => 'Flour',
                'quantity' => 50,
                'ideal' => 100,
                'unit_of_measurement' => 'kg',
                'purchase_date' => '2024-04-01',
                'expiration_date' => '2024-10-01',
                'supplier_name' => 'Best Supplies Inc.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'ingredient_name' => 'Sugar',
                'quantity' => 75,
                'ideal' => 150,
                'unit_of_measurement' => 'kg',
                'purchase_date' => '2024-04-05',
                'expiration_date' => '2024-10-05',
                'supplier_name' => 'Sweet Tooth LLC',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'ingredient_name' => 'Eggs',
                'quantity' => 200,
                'ideal' => 300,
                'unit_of_measurement' => 'pieces',
                'purchase_date' => '2024-04-10',
                'expiration_date' => '2024-05-01',
                'supplier_name' => 'Farm Fresh Eggs',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'ingredient_name' => 'Whole Chicken',
                'quantity' => 40,
                'ideal' => 80,
                'unit_of_measurement' => 'kg',
                'purchase_date' => '2024-04-02',
                'expiration_date' => '2024-04-20',
                'supplier_name' => 'Quality Meats',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'ingredient_name' => 'Olive Oil',
                'quantity' => 20,
                'ideal' => 50,
                'unit_of_measurement' => 'liters',
                'purchase_date' => '2024-03-25',
                'expiration_date' => '2025-03-25',
                'supplier_name' => 'Olive Oil Imports Ltd.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            // Additional entries
            [
                'ingredient_name' => 'Tomatoes',
                'quantity' => 30,
                'ideal' => 60,
                'unit_of_measurement' => 'kg',
                'purchase_date' => '2024-04-01',
                'expiration_date' => '2024-04-15',
                'supplier_name' => 'Local Farms Co.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'ingredient_name' => 'Onions',
                'quantity' => 20,
                'ideal' => 40,
                'unit_of_measurement' => 'kg',
                'purchase_date' => '2024-04-03',
                'expiration_date' => '2024-05-03',
                'supplier_name' => 'Local Farms Co.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'ingredient_name' => 'Garlic',
                'quantity' => 10,
                'ideal' => 20,
                'unit_of_measurement' => 'kg',
                'purchase_date' => '2024-04-02',
                'expiration_date' => '2024-06-02',
                'supplier_name' => 'Spice Traders Ltd.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'ingredient_name' => 'Bell Peppers',
                'quantity' => 15,
                'ideal' => 30,
                'unit_of_measurement' => 'kg',
                'purchase_date' => '2024-04-04',
                'expiration_date' => '2024-04-18',
                'supplier_name' => 'Green Growers',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'ingredient_name' => 'Beef',
                'quantity' => 50,
                'ideal' => 100,
                'unit_of_measurement' => 'kg',
                'purchase_date' => '2024-04-01',
                'expiration_date' => '2024-04-15',
                'supplier_name' => 'Quality Meats',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'ingredient_name' => 'Basil',
                'quantity' => 5,
                'ideal' => 10,
                'unit_of_measurement' => 'kg',
                'purchase_date' => '2024-04-06',
                'expiration_date' => '2024-04-20',
                'supplier_name' => 'Herb Garden Delights',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'ingredient_name' => 'Cheese',
                'quantity' => 25,
                'ideal' => 50,
                'unit_of_measurement' => 'kg',
                'purchase_date' => '2024-04-07',
                'expiration_date' => '2024-06-07',
                'supplier_name' => 'Dairy Fresh Farms',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'ingredient_name' => 'Soy Sauce',
                'quantity' => 10,
                'ideal' => 20,
                'unit_of_measurement' => 'litter',
                'purchase_date' => '2024-04-07',
                'expiration_date' => '2024-06-07',
                'supplier_name' => 'Datu Puti Company',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'ingredient_name' => 'Salmon',
                'quantity' => 20,
                'ideal' => 20,
                'unit_of_measurement' => 'pieces',
                'purchase_date' => '2024-04-07',
                'expiration_date' => '2024-06-07',
                'supplier_name' => 'Datu Puti Company',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],

        ];

        // Using Query Builder to insert data
        $this->db->table('food_stocks')->insertBatch($data);
    }
}