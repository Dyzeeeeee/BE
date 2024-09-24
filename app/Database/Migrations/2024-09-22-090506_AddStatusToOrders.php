<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddStatusToOrders extends Migration
{
    public function up()
    {
        // Add column 'status' to the 'orders' table
        $fields = [
            'status' => [
                'type'       => 'ENUM',
                'constraint' => ['preparing', 'serving'],
                'default'    => 'preparing',
                'null'       => false,
            ],
        ];
        $this->forge->addColumn('order_details', $fields);
    }

    public function down()
    {
        // Remove the 'status' column from the 'orders' table
        $this->forge->dropColumn('order_details', 'status');
    }
}
