<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCustomersTable extends Migration
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
            'firstname' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'lastname' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'email' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'unique' => true,
            ],
            'phone' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
            ],
            'address' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
            ],
            'birthday' => [
                'type' => 'DATE',
            ],
            'archived_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('customers');
    }

    public function down()
    {
        $this->forge->dropTable('customers');
    }
}
