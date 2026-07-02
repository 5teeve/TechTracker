<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMarqueTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_marque'  => ['type' => 'INTEGER', 'auto_increment' => true],
            'nom_marque' => ['type' => 'TEXT'],
        ]);
        $this->forge->addPrimaryKey('id_marque');
        $this->forge->createTable('marque');
    }

    public function down()
    {
        $this->forge->dropTable('marque');
    }
}