<?php


namespace App\Controllers;

use App\Models\CaisseModel;

class CaisseController extends BaseController
{
    public function index()
    {
        $caisseModel = new CaisseModel();
        
        $data['caisses'] = $caisseModel->findAll();

        return view('formCaisse', $data);
    }

}
?>