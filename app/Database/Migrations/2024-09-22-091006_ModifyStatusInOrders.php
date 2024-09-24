<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ModifyStatusInOrders extends Migration
{
    public function up()
    {
        // First, drop the existing column
        $this->forge->modifyColumn('orders', [
            'status' => [
                'name'       => 'status',
                'type'       => 'ENUM',
                'constraint' => ['pending', 'paid', 'cancelled'],
                'default'    => 'pending',
                'null'       => false,
            ],
        ]);
    }

    public function down()
    {
        $this->forge->dropColumn('orders', 'status');
    }
}
