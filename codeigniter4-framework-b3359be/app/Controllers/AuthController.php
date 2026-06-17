<?php
namespace app\Controllers;

use App\Models\Employes;

class AuthController extends BaseController
{
    public function showLoginForm()
    {
        if (session()->get('user')) {
            return redirect()->to('/dashboard');
        }
        return view('auth/login');
    }

    public function login()
    {
        $model = new UserModel();
        $email = trim((string) $this->request->getPost('email'));
        $password = (string) $this->request->getPost('mdp');

        if ($email === '' || $password === '') {
            return redirect()->back()->withInput()->with('erreur', 'Veuillez renseigner email et mot de passe.');
        }

        $user = $model->where('email', $email)->first();
        if (!$user || empty($user['mdp']) || !password_verify($password, $user['mdp'])) {
            return redirect()->back()->withInput()->with('erreur', 'Email ou mot de passe incorrect.');
        }

        if (array_key_exists('actif', $user) && (int) $user['actif'] !== 1) {
            return redirect()->back()->withInput()->with('erreur', 'Compte inactif.');
        }

        session()->set('user', [
            'id'    => $user['id'],
            'nom'   => $user['nom'],
            'email' => $user['email'],
            'role'  => $user['role'],
        ]);
        return redirect()->to('/caisse');
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

}
