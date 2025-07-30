<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddCoverImageToBooks extends Migration
{
    public function up()
    {
         $this->forge->addColumn('books', [
        'cover_image' => [
            'type'       => 'VARCHAR',
            'constraint' => 255,
            'null'       => true,
            'after'      => 'publication_year' // optional
        ],
         ]);
    }

    public function down()
    {
         $this->forge->dropColumn('books', 'cover_image');
    }
}
