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
}
