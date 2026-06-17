<?php

namespace App\Controllers;

class AchatController extends BaseController
{
    public function index(): string
    {
        $caisse = session()->get('caisse');

        return view('achat/index', [
            'caisse' => $caisse,
        ]);
    }
}
