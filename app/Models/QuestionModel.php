<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class PostModel
 *
 * @package App\Models
 */
class QuestionModel extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'question';

    /**
     * @var string $primaryKey
     */
    protected $primaryKey = 'id';

    /**
     * Model removes all other fields from input data
     *
     * @var array $allowedFields
     */
    protected $allowedFields = [
        'author', 'email', 'title',
        'content', 'created_at', 'updated_at'
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
        $data['data']['created_at'] = date("Y-m-d H:i:s");
        $data['data']['updated_at'] = date("Y-m-d H:i:s");
        return $data;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function callBeforeUpdate(array $data = []): array
    {
        $data['data']['updated_at'] = date("Y-m-d H:i:s");
        return $data;
    }


}