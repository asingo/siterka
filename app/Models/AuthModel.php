<?php

namespace App\Models;

use CodeIgniter\Model;

class AuthModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $allowedFields = ["user", "pass", "name", "salt", "role", "pic"];
    protected $useTimestamps = true;

    public function getSync($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sinkronisasi');
        $builder->where('id_orang', $id);
        return $builder;
    }
}
