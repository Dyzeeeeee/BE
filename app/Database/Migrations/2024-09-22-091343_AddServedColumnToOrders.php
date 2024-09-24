<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddServedColumnToOrders extends Migration
{
    public function up()
    {
        // Add the 'served' column to the 'orders' table
        $fields = [
            'completed' => [
                'type'       => 'BOOLEAN',
                'default'    => false,
                'null'       => false,
            ],
        ];
        $this->forge->addColumn('orders', $fields);
    }

    public function down()
    {
        // Remove the 'completed' column from the 'orders' table if rolling back the migration
        $this->forge->dropColumn('orders', 'completed');
    }
}
