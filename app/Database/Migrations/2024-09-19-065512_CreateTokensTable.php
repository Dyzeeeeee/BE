<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTokensTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'token' => [
                'type' => 'TEXT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('tokens');
    }
    
    public function down()
    {
        $this->forge->dropTable('tokens');
    }
    
}
