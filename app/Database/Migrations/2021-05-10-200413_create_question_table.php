<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

/**
 * Class CreateUsersTable
 *
 * @package Auth\Database\Migrations
 */
class CreateQuestionTable extends Migration
{
    /**
     * @var string $table
     */
    private $table = 'question';

    /*
     * Create table {$this->table}
     */
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'bigint', 'unsigned' => true, 'auto_increment' => true],
            'author' => ['type' => 'varchar', 'constraint' => 32],
            'email' => ['type' => 'varchar', 'constraint' => 128],
            'title' => ['type' => 'varchar', 'constraint' => 255],
            'content' => ['type' => 'text', 'constraint' => 5000],
            'created_at' => ['type' => 'timestamp'],
            'updated_at' => ['type' => 'timestamp']
        ]);
        $this->forge->addKey('id', true);
        //   $this->forge->addUniqueKey('email');
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