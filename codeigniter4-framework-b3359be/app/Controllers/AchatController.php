<?php

namespace App\Controllers;

use App\Models\AchatModel;
use App\Models\ProduitModel;

class AchatController extends BaseController
{
    public function index()
    {
        $caisse = session()->get('caisse');
        if (! $caisse) {
            return redirect()->to('/caisse');
        }

        $produitModel = new ProduitModel();
        $achatModel = new AchatModel();

        if (! session()->has('achat_ticket')) {
            session()->set('achat_ticket', sprintf(
                'TK-%s-%s',
                $caisse['numero'],
                date('YmdHis')
            ));
        }

        return view('achats/index', [
            'caisse' => $caisse,
            'produits' => $produitModel->getAllProducts(),
            'achats' => $achatModel->getOpenItemsForCaisse((int) $caisse['id']),
            'ticket' => session()->get('achat_ticket'),
            'error' => session()->getFlashdata('error'),
            'message' => session()->getFlashdata('message'),
        ]);
    }

    public function ajouter()
    {
        $caisse = session()->get('caisse');
        if (! $caisse) {
            return redirect()->to('/caisse')->with('error', 'Choisis une caisse avant de saisir un achat.');
        }

        $rules = [
            'produit_id' => 'required|is_natural_no_zero',
            'quantite'   => 'required|is_natural_no_zero',
        ];

        if (! $this->validate($rules)) {
            return redirect()->to('/achats')->withInput()->with('error', 'Merci de compléter correctement le formulaire.');
        }

        $produitId = (int) $this->request->getPost('produit_id');
        $quantite = (int) $this->request->getPost('quantite');

        $produitModel = new ProduitModel();
        $produit = $produitModel->find($produitId);

        if (! $produit) {
            return redirect()->to('/achats')->with('error', 'Produit introuvable.');
        }

        if ((int) $produit['quantite_stock'] < $quantite) {
            return redirect()->to('/achats')->with('error', 'Stock insuffisant pour ce produit.');
        }

        if (! session()->has('achat_ticket')) {
            session()->set('achat_ticket', sprintf(
                'TK-%s-%s',
                $caisse['numero'],
                date('YmdHis')
            ));
        }

        $ticket = session()->get('achat_ticket');
        $montantTotal = $quantite * (float) $produit['prix'];
        $achatModel = new AchatModel();
        $db = db_connect();

        $db->transStart();

        $achatModel->insert([
            'caisse_id'         => (int) $caisse['id'],
            'produit_id'        => $produitId,
            'numero_ticket'     => $ticket,
            'client_reference'  => null,
            'quantite'          => $quantite,
            'prix_unitaire'     => $produit['prix'],
            'montant_total'     => $montantTotal,
            'statut'            => 'en_cours',
        ]);

        $produitModel->update($produitId, [
            'quantite_stock' => (int) $produit['quantite_stock'] - $quantite,
        ]);

        $db->transComplete();

        if ($db->transStatus() === false) {
            return redirect()->to('/achats')->with('error', 'Impossible d enregistrer cet achat.');
        }

        return redirect()->to('/achats')->with('message', 'Produit ajouté à la saisie.');
    }
        public function cloturer()
    {
        $caisse = session()->get('caisse');
        (new AchatModel())->closeCurrentSession((int) $caisse['id']);
        session()->remove('achat_ticket');
        return redirect()->to('/achats')->with('message', 'Achat clôturé.');
    }
}
