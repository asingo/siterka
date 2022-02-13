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
    public function sync($id, $idUser)
    {
        $db = \Config\Database::connect();
        $builder = $db->table('sinkronisasi');
        $builder->insert([
            'id_orang' => $id,
            'sync_status' => 1,
            'id_user' => $idUser
        ]);
        $sql = "update user set id_orang = " . $db->escape($id) . " where id =" . $db->escape($id);
        $db->query($sql);
        return $builder;
    }
    public function getSync($id)
    {
        $db = \Config\Database::connect();

        $query = $db->query("SELECT * FROM anggota.sinkronisasi where id_user =" . $db->escape($id));
        $r = $query->getResultObject();
        // $builder->where('id_orang', $id)->get;
        return $r;
    }
}
