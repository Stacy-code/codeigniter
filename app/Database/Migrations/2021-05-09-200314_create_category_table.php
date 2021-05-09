<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Class CreateCategoryTable
 *
 * @package App\Database\Migrations
 */
class CreateCategoryTable extends Migration
{
    /**
     * @var string $table
     */
    private $table = 'category';

    /*
     * Create table {$this->table}
     */
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'parent_id' => ['type' => 'int', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'name' => ['type' => 'varchar', 'constraint' => 128],
            'description' => ['type' => 'varchar', 'constraint' => 255, 'null' => true],
            'created_at' => ['type' => 'bigint', 'null' => true],
            'updated_at' => ['type' => 'bigint', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('parent_id', $this->table, 'id', 'cascade', 'restrict');
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
