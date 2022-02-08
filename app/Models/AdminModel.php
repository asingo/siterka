<?php

namespace App\Models;

use CodeIgniter\Model;

class AdminModel extends Model
{
    protected $table = 'orang';
    protected $useTimestamps = true;
    protected $allowedFields = ['callsign', 'nik', 'nama', 'alamat', 'kecamatan', 'email', 'nohp', 'foto', 'lakuiar', 'lakukta', 'scaniar', 'fotoktp', 'scankta', 'emailsdppi', 'passsdppi'];

    public function getDetail($callsign)
    {
        return $this->where(['callsign' => $callsign])->first();
    }
    public function search($query)
    {
        $builder = $this->table('orang');
        $builder->like('nama', $query)->orLike('callsign', $query);
        return $builder;
    }
}
