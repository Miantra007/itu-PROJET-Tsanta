<?php


namespace App\Controllers;

use App\Models\ProduitModel;
use App\Models\AchatModel;
use App\Models\DetailAchatModel;


class AchatController extends BaseController
{
    public function index()
    {
        $produitModel = new ProduitModel();

        $data['produits'] = $produitModel->findAll();

        return view('Achats', $data);
    }

    public function ajouter()
    {
        $session = session();

        $id_client = $session->get('id_client');
        $caisse = $session->get('caisse_active');

        $id_caisse = $caisse['id'];

        $id_produit = $this->request->getPost('id_produit');
        $quantite = (int) $this->request->getPost('quantite');

        $produitModel = new ProduitModel();
        $achatModel = new AchatModel();
        $detailModel = new DetailAchatModel();

        $produit = $produitModel->find($id_produit);

        if (!$produit) {
            return redirect()->back()->with('error', 'Produit introuvable');
        }

        if ($produit['quantite_stock'] < $quantite) {
            return redirect()->back()->with('error', 'Stock insuffisant');
        }

        $achat = $achatModel
            ->where('id_client', $id_client)
            ->where('id_caisse', $id_caisse)
            ->where('est_cloture', 0)
            ->first();

        if (!$achat) {
            $achatId = $achatModel->insert([
                'id_client' => $id_client,
                'id_caisse' => $id_caisse,
                'est_cloture' => 0
            ]);
        } else {
            $achatId = $achat['id_achat'];
        }

        $detailModel->insert([
            'id_achat' => $achatId,
            'id_produit' => $id_produit,
            'quantite' => $quantite,
            'prix_unitaire_facture' => $produit['prix_unitaire']
        ]);

        $newStock = $produit['quantite_stock'] - $quantite;

        $produitModel->update($id_produit, [
            'quantite_stock' => $newStock
        ]);

        return redirect()->back()->with('success', 'Produit ajouté au panier');
    }

}





?>