<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailAchatModel extends Model
{
    protected $table = 'detail_achat';
    protected $primaryKey = 'id_detail';

    protected $useAutoIncrement = true;
    protected $returnType = 'array';

    protected $useTimestamps = false;

    protected $allowedFields = [
        'id_achat',
        'id_produit',
        'quantite',
        'prix_unitaire_facture'
    ];
}