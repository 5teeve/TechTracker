<?php

namespace App\Controllers;

use App\Models\EquipementModel;
use App\Models\CategorieModel;
use App\Models\MarqueModel;

class Equipements extends BaseController
{
    protected EquipementModel $equipementModel;
    protected CategorieModel $categorieModel;
    protected MarqueModel $marqueModel;

    public function __construct()
    {
        $this->equipementModel = new EquipementModel();
        $this->categorieModel  = new CategorieModel();
        $this->marqueModel     = new MarqueModel();
    }

    // Affichage de l'inventaire
    public function index()
    {
        $data['equipements'] = $this->equipementModel->getEquipementsWithDetails();

        return view('equipements/index', $data);
    }

    // Affiche le formulaire d'ajout
    public function new()
    {
        $data['categories'] = $this->categorieModel->findAll();
        $data['marques']    = $this->marqueModel->findAll();

        return view('equipements/create', $data);
    }

    // Traite la soumission du formulaire
    public function create()
    {
        $rules = [
            'modele'         => 'required|min_length[2]',
            'prix_unitaire'  => 'required|decimal',
            'quantite_stock' => 'required|integer',
            'id_categorie'   => 'required|integer',
            'id_marque'      => 'required|integer',
        ];

        if (! $this->validate($rules)) {
            $data['categories'] = $this->categorieModel->findAll();
            $data['marques']    = $this->marqueModel->findAll();
            $data['validation'] = $this->validator;

            return view('equipements/create', $data);
        }

        $this->equipementModel->insert([
            'modele'         => $this->request->getPost('modele'),
            'prix_unitaire'  => $this->request->getPost('prix_unitaire'),
            'quantite_stock' => $this->request->getPost('quantite_stock'),
            'id_categorie'   => $this->request->getPost('id_categorie'),
            'id_marque'      => $this->request->getPost('id_marque'),
        ]);

        return redirect()->to('/equipements')->with('success', 'Matériel ajouté avec succès.');
    }
}