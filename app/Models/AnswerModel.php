<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class QuestionModel
 *
 * @package App\Models
 */
class AnswerModel extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'answer';

    /**
     * @var string $primaryKey
     */
    protected $primaryKey = 'id';

    /**
     * @var string $foreignKey
     */
    protected $foreignKey = 'question_id';

    /**
     * Model removes all other fields from input data
     *
     * @var array $allowedFields
     */
    protected $allowedFields = [
        'question_id' , 'author',
        'content', 'date_create'
    ];

    /**
     * @var array $beforeInsert
     */
    protected $beforeInsert = ['callBeforeInsert'];

    /**
     * @var array $beforeUpdate
     */
    protected $beforeUpdate = ['callBeforeUpdate'];

    /**
     * @param array $data
     *
     * @return array
     */
    protected function callBeforeInsert(array $data = []): array
    {
        $data['data']['date_create'] = date("Y-m-d H:i:s");
        return $data;
    }




}