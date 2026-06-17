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

    public function selectionner()
    {
        $idCaisse = $this->request->getPost('id_caisse');

        if ($idCaisse) {

            $caisseModel = new CaisseModel();
            $caisse = $caisseModel->find($idCaisse);

            if ($caisse) {
                $session = session();
                $session->set('caisse_active', [
                    'id'  => $caisse['id_caisse'],
                    'num' => $caisse['num_caisse']
                ]);

                return redirect()->to('/achats');
            }
        }

        return redirect()->back()->with('il faut choisir une caisse');
    }
}




?>