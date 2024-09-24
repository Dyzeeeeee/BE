<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFoodStocksTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'ingredient_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'ideal' => [
                'type' => 'INT',
                'constraint' => 11,
            ],
            'unit_of_measurement' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'purchase_date' => [
                'type' => 'DATE',
            ],
            'expiration_date' => [
                'type' => 'DATE',
            ],
            'supplier_name' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('food_stocks');
    }

    public function down()
    {
        $this->forge->dropTable('food_stocks');
    }
}