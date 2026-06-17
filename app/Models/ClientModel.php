<?php

namespace App\Models;
use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table = 'client';
    protected $primaryKey = 'id_client';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';


    protected $allowedFields = [
        'nom',
        'email',
        'mot_de_passe'

    ];




}