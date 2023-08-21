<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Artikel extends Migration
{
    public function up()
    {
        //field table artikel
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'auto_increment' => true
            ],
            'judul' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'penulis' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            'konten' => [
                'type' => 'VARCHAR',
                'constraint' => 200,
            ],
            'tanggal_publikasi' => [
                'type' => 'DATE',
            ],
            'kategori' => [
                'type' => 'VARCHAR',
                'constraint' => 50
            ],
            'view' => [
                'type' => 'INT',
                'constraint' => 11
            ]
            ]);
            $this->forge->addKey('id', true);
            $this->forge->createTable('artikel');
    }

    public function down()
    {
        //
    }
}
