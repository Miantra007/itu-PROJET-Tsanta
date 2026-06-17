<?php
namespace App\Controllers;

class RHController extends BaseController
{
    public function __construct()
    {
        helper('url');
        if (!session()->get('isLoggedIn') || session()->get('user_role') !== 'rh') {
            return redirect()->to('/');
        }
    }

    public function dashboard()
    {
        $data = [
            'user' => [
                'prenom' => session()->get('user_prenom'),
                'nom' => session()->get('user_nom'),
                'email' => session()->get('user_email'),
                'role' => session()->get('user_role'),
            ]
        ];
        return view('rh/liste-rh', $data);
    }
}
