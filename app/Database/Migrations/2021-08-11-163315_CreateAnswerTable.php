<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAnswerTable extends Migration
{
    /**
     * @var string $table
     */
    private $table = 'answer';

    /*
     * Create table {$this->table}
     */
    public function up()
    {
        $this->forge->addField([
            'id' => ['type' => 'bigint', 'unsigned' => true, 'auto_increment' => true],
            'question_id' => ['type' => 'bigint', 'unsigned' => true],
            'author' => ['type' => 'varchar', 'constraint' => 32],
            'content' => ['type' => 'text'],
            'date_create' => ['type' => 'timestamp'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('question_id','question','id','CASCADE','CASCADE');
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
