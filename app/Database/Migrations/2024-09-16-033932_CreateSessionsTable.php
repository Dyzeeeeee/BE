<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateSessionTable extends Migration
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
            'cashier_id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
            ],
            'start_time' => [
                'type' => 'DATETIME',
                'default' => date('Y-m-d H:i:s'),
            ],
            'end_time' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'status' => [
                'type' => 'ENUM',
                'constraint' => ['open', 'closed'],
                'default' => 'open',
            ],
            'opening_cash' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => '0.00',
            ],
            'total_cash' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'default' => '0.00',
            ],
            'note' => [
                'type' => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('cashier_id', 'users', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('sessions');
    }

    public function down()
    {
        $this->forge->dropTable('sessions');
    }
}