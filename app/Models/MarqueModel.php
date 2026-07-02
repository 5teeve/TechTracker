<?php

namespace App\Models;

use CodeIgniter\Model;

class MarqueModel extends Model
{
    protected $table         = 'marque';
    protected $primaryKey    = 'id_marque';
    protected $allowedFields = ['nom_marque'];
    protected $returnType    = 'array';
    protected $useTimestamps = false;
}