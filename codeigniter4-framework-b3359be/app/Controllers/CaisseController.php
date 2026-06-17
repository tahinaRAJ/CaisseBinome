<?php 

class CaisseController extends BaseController
{
    public function index()
    {
        return view('caisse');
    }
    public function search()
    {
        $searchTerm = $this->request->getGet('search');
        $produitModel = new \App\Models\ProduitModel();
        $produits = $produitModel->like('designation', $searchTerm)->findAll();

        return view('caisse', ['produits' => $produits]);
    }
}
