<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateOnlineOrderTable extends Migration
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
            'customer_id' => [
                'type'       => 'INT',
                'constraint' => 5,
                'unsigned'   => true
            ],
            'qrcode' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
                'unique'     => true,
            ],
            'confirmed' => [
                'type'       => 'BOOLEAN',
                'default'    => false,
            ],
            'service' => [
                'type' => 'ENUM',
                'constraint' => ['Dine in', 'Take out'],
                'default' => 'Dine in',
            ],
            'total_price' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
                'default'    => '0.00',
            ],
            'created_at datetime default current_timestamp',
            'updated_at datetime default current_timestamp on update current_timestamp',
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('customer_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('online_orders');
    }

    public function down()
    {
        $this->forge->dropTable('online_orders');
    }
}
