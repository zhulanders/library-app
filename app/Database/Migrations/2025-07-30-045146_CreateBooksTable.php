<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateBooksTable extends Migration
{
    public function up()
    {
         $this->forge->addField([
        'id'              => ['type' => 'INT', 'auto_increment' => true],
        'title'           => ['type' => 'VARCHAR', 'constraint' => 255],
        'author'          => ['type' => 'VARCHAR', 'constraint' => 255],
        'genre'           => ['type' => 'VARCHAR', 'constraint' => 100],
        'publication_year'=> ['type' => 'YEAR'],
        'created_at'      => ['type' => 'DATETIME', 'null' => true],
        'updated_at'      => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('books');
    }

    public function down()
    {
        //
    }
}
