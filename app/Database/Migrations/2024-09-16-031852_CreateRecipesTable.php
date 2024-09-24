<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateRecipesTable extends Migration
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
            'menu_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false,
                'comment' => 'Foreign key to menu table',
            ],
            'foodstock_id' => [
                'type' => 'INT',
                'unsigned' => true,
                'null' => false,
                'comment' => 'Foreign key to foodstocks table',
            ],

            'quantity' => [
                'type' => 'INT',
                'null' => false,
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'default' => null,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('menu_id', 'menu', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('foodstock_id', 'food_stocks', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('recipes');
    }

    public function down()
    {
        $this->forge->dropTable('recipes', true);
    }
}