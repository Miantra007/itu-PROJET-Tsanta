<?php


namespace App\Controllers;

use App\Models\ProduitModel;

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