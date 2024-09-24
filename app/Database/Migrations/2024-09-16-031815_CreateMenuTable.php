<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMenuTable extends Migration
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
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => true,
            ],
            'image' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'price' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'category_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => true,
            ],
            'orders' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'default' => 0,
            ],
            'archived_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->addForeignKey('category_id', 'categories', 'id', 'CASCADE', 'SET NULL');
        $this->forge->createTable('menu');
    }

    public function down()
    {
        $this->forge->dropTable('menu');
    }
}