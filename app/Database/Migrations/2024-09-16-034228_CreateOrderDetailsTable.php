<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOrderDetailsTable extends Migration
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
            'order_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'menu_item_id' => [
                'type' => 'INT',
                'unsigned' => true,
            ],
            'quantity' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'subtotal' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('order_id', 'orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('menu_item_id', 'menu', 'id', 'CASCADE', 'CASCADE'); // Add foreign key constraint to menu table
        $this->forge->createTable('order_details');
    }
 

    public function down()
    {
        $this->forge->dropTable('order_details');
    }
}