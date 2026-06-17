<?php

namespace App\Models;
use CodeIgniter\Model;

class EmployeModel extends Model
{
    protected $table = 'employes';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $returnType = 'array';


    protected $allowedFields = [
        'departement_id',
        'nom',
        'prenom',
        'email',
        'mot_de_passe',
        'role',
        'date_embauche',
        'actif'


    ];




}