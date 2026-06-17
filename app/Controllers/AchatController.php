<?php


namespace App\Controllers;




class AchatController extends BaseController
{
    public function index()
    {
        $produitModel = new ProduitModel();

        $data['produits'] = $produitModel->findAll();

        return view('Achats', $data);
    }

}





?>