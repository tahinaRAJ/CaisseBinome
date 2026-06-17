<?php 

namespace App\Controllers; // 1. On indique où se trouve ce fichier

use App\Controllers\BaseController; // 2. On importe le BaseController de CodeIgniter 4

class CaisseController extends BaseController
{
    public function index()
    {
        return view('caisse/caisse');
    }

    public function search()
    {
        $searchTerm = $this->request->getGet('search');
        $produitModel = new \App\Models\ProduitModel();
        $produits = $produitModel->like('designation', $searchTerm)->findAll();

        return view('caisse', ['produits' => $produits]);
    }
}