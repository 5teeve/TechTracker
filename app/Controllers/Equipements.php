<?php

namespace App\Controllers;

use App\Models\EquipementModel;
use App\Models\CategorieModel;
use App\Models\MarqueModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class Equipements extends BaseController
{
    protected EquipementModel $equipementModel;
    protected CategorieModel $categorieModel;
    protected MarqueModel $marqueModel;

    public function __construct()
    {
        $this->equipementModel = new EquipementModel();
        $this->categorieModel = new CategorieModel();
        $this->marqueModel = new MarqueModel();
    }

    public function index()
    {
        $data['equipements'] = $this->equipementModel->getEquipementsWithDetails();

        return view('equipements/index', $data);
    }

    public function new()
    {
        $categorieModel = new CategorieModel();
        $marqueModel = new MarqueModel();
        $data = [
            'titre' => 'Ajouter un nouveau materiel',
            'action_url' => 'equipements/create',
            'bouton_texte' => 'Enregistrer',
            'mode_edition' => false,
            'categories' => $categorieModel->findAll(),
            'marques' => $marqueModel->findAll()
        ];

        return view('equipements/create', $data);
    }

    public function create()
    {
        $equipementModel = new EquipementModel();
        $rules = [
            'modele' => 'required|min_length[2]',
            'prix_unitaire' => 'required|decimal',
            'quantite_stock' => 'required|integer',
            'id_categorie' => 'required|integer',
            'id_marque' => 'required|integer',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
        $equipementModel->insert($this->request->getPost());
        return redirect()->to('/')->with('succes', 'Materiel ajouté avec succes');
    }

    public function edit($id)
    {
        $equipementModel = new EquipementModel();
        $categorieModel = new CategorieModel();
        $marqueModel = new MarqueModel();

        $equipement = $equipementModel->find($id);

        if (!$equipement) {
            throw PageNotFoundException::forPageNotFound("Ce materiel n'existe pas");
        }

        $data = [
            'titre' => 'Modifier le matériel : ' . $equipement['modele'],
            'action_url' => 'equipements/update/' . $equipement['id_equipement'],
            'bouton_texte' => 'Enregistrer les modifications',
            'mode_edition' => true,
            'equipement' => $equipement,
            'categories' => $categorieModel->findAll(),
            'marques' => $marqueModel->findAll()
        ];

        return view('equipements/create', $data);
    }

    public function update($id)
    {
        $equipementModel = new EquipementModel();

        $rules = [
            'modele' => 'required',
            'id_categorie' => 'required|integer',
            'id_marque' => 'required|integer',
            'prix_unitaire' => 'required|decimal',
            'quantite_stock' => 'required|integer',
        ];

        if (!$this->validate($rules)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $equipementModel->update($id, $this->request->getPost());
        return redirect()->to('/')->with('succes', 'Materiel modifier avec succes');
    }

    public function delete($id)
    {
        $equipementModel = new EquipementModel();
        if ($equipementModel->find($id)) {
            $equipementModel->delete($id);
            return redirect()->to('/')->with('succes', 'Materiel supprimer avec succes');
        }

        return redirect()->to('/')->with('errors', ['Impossible de supprimer un élément inexistant.']);
    }
}