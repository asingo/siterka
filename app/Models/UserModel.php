<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'orang';
    protected $primaryKey = 'id';
    protected $allowedFields = ['callsign', 'nik', 'nama', 'alamat', 'kecamatan', 'email', 'nohp', 'foto', 'lakuiar', 'lakukta', 'scaniar', 'fotoktp', 'scankta', 'emailsdppi', 'passsdppi'];
    protected $useTimestamps = true;

    public function verify($callsign, $lakuiar)
    {
        return $this->where(['callsign' => $callsign, 'lakuiar' => $lakuiar])->first();
    }
    public function getDetail($callsign)
    {
        return $this->where(['callsign' => $callsign])->first();
    }
    public function sync($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sinkronisasi');
        $builder->insert([
            'id_orang' => $id,
            'sync_status' => 1
        ]);
        return $builder;
    }
    public function getSync($id)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sinkronisasi');
        $builder->get();
        // $builder->where('id_orang', $id)->get;
        return $builder;
    }
}
