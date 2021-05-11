<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Class CreatePostTable
 *
 * @package App\Database\Migrations
 */
class CreatePostTable extends Migration
{
    /**
     * @var string $table
     */
    private $table = 'post';

    /*
     * Create table {$this->table}
     */
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'category_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'author_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true],
            'title' => ['type' => 'varchar', 'constraint' => 255],
            'content' => ['type' => 'text'],
            'publish' => ['type' => 'tinyint', 'constraint' => 1, 'null' => 0, 'default' => 0],
            'published_at' => ['type' => 'bigint', 'null' => true],
            'created_at' => ['type' => 'bigint', 'null' => true],
            'updated_at' => ['type' => 'bigint', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('author_id', 'users', 'id', 'cascade', 'restrict');
        $this->forge->addForeignKey('category_id', 'category', 'id', 'cascade', 'restrict');
        $this->forge->createTable($this->table, true);
    }

    /*
     * Drop table {$this->table}
     */
    public function down()
    {
        $this->forge->dropTable($this->table, true);
    }
}
