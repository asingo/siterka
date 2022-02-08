<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Anggota extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'callsign'       => [
                'type'       => 'VARCHAR',
                'constraint' => '10',
            ],
            'nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'alamat' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'kecamatan' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'email'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'foto' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'hp' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'scaniar'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'scankta'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'fotoktp' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'nik' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'lakuiar'       => [
                'type'       => 'DATE',
            ],
            'lakukta'       => [
                'type'       => 'DATE',
            ],
            'emailsdppi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'passsdppi' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'entered_by' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('orang');
    }

    public function down()
    {
        $this->forge->dropTable('orang');
    }
}
