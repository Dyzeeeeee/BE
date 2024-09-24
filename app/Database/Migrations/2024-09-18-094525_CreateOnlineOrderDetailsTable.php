<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOnlineOrderDetailsTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'menu_item_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true
            ],
            'quantity' => [
                'type'       => 'INT',
                'constraint' => 5,
            ],
            'subtotal' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'online_order_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('menu_item_id', 'menu', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('online_order_id', 'online_orders', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('online_order_details');
    }

    public function down()
    {
        $this->forge->dropTable('online_order_details');
    }
}
