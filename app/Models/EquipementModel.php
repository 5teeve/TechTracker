<?php

namespace App\Models;

use CodeIgniter\Model;

class EquipementModel extends Model
{
    protected $table         = 'equipement';
    protected $primaryKey    = 'id_equipement';
    protected $allowedFields = ['modele', 'prix_unitaire', 'quantite_stock', 'id_categorie', 'id_marque'];
    protected $returnType    = 'array';
    protected $useTimestamps = false;

    // Récupère tous les équipements avec le nom de leur catégorie et de leur marque
    public function getEquipementsWithDetails(): array
    {
        return $this->select('equipement.*, categorie.nom_categorie, marque.nom_marque')
                    ->join('categorie', 'categorie.id_categorie = equipement.id_categorie')
                    ->join('marque', 'marque.id_marque = equipement.id_marque')
                    ->findAll();
    }
}