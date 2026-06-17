<?php


namespace App\Controllers;




class AchatController extends BaseController
{
    public function index()
    {
        return view('Achats');
    }
    public function showAchat()
    {
        $produitModel = new ProduitModel();

        $data['caisses'] = $produitModel->findAll();

        return view('FormCaisse', $data);
    }
}





?>