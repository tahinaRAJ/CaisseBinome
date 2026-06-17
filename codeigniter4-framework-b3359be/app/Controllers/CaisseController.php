<?php

namespace App\Controllers;

use App\Models\CaisseModel;

class CaisseController extends BaseController
{
    public function index(): string
    {
        $caisseModel = new CaisseModel();

        return view('caisse/caisse', [
            'caisses' => $caisseModel->getActiveCaisses(),
            'selectedCaisse' => session()->get('caisse'),
            'error' => session()->getFlashdata('error'),
        ]);
    }

    public function select()
    {
        $numero = $this->request->getPost('caisse_numero');

        if (! is_numeric($numero)) {
            return redirect()->to('/')->with('error', 'Choisis un numéro de caisse valide.');
        }

        $caisse = (new CaisseModel())->findActiveByNumero((int) $numero);

        if (! $caisse) {
            return redirect()->to('/')->with('error', 'Cette caisse n existe pas.');
        }

        session()->set('caisse', $caisse);

        return redirect()->to('/achat');
    }
}
