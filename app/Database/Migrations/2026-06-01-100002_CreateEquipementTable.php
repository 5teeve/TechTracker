<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateEquipementTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_equipement'  => ['type' => 'INTEGER', 'auto_increment' => true],
            'modele'         => ['type' => 'TEXT', 'null' => false],
            'prix_unitaire'  => ['type' => 'REAL', 'null' => false],
            'quantite_stock' => ['type' => 'INTEGER', 'null' => false],
            'id_categorie'   => ['type' => 'INTEGER', 'null' => false],
            'id_marque'      => ['type' => 'INTEGER', 'null' => false],
        ]);
        $this->forge->addPrimaryKey('id_equipement');
        $this->forge->addForeignKey('id_categorie', 'categorie', 'id_categorie');
        $this->forge->addForeignKey('id_marque', 'marque', 'id_marque');
        $this->forge->createTable('equipement');
    }

    public function down()
    {
        $this->forge->dropTable('equipement');
    }
}
