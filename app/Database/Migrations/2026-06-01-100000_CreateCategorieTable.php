<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategorieTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_categorie'  => ['type' => 'INTEGER', 'auto_increment' => true],
            'nom_categorie' => ['type' => 'TEXT'],
        ]);
        $this->forge->addPrimaryKey('id_categorie');
        $this->forge->createTable('categorie');
    }

    public function down()
    {
        $this->forge->dropTable('categorie');
    }
}