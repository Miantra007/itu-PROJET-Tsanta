<?php

namespace App\Controllers;

use App\Models\ClientModel;

class AuthController extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function login()
    {
        $session = session();
        $model = new ClientModel();

        $email = $this->request->getPost('email');
        $mdp = $this->request->getPost('mdp');

        if (empty($email) || empty($mdp)) {
            return redirect()->back()->with('error', 'Tous les champs sont obligatoires');
        }
        $user = $model
            ->select('id_client, nom, email, mot_de_passe')
            ->where('email', $email)
            ->first();

        if (!$user) {
            return redirect()->back()->with('error', 'Email incorrect');
        }

        if ($mdp != $user['mot_de_passe']) {
            return redirect()->back()->with('error', 'Mot de passe incorrect');
        }

        $session->set([
            'id_client' => $user['id_client'],
            'nom' => $user['nom'],
            'email' => $user['email'],
            'isLoggedIn' => true
        ]);

        return redirect()->to('/caisse');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}