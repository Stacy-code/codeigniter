<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class PostModel
 *
 * @package App\Models
 */
class PostModel extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'post';

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
        'category_id', 'author_id', 'title',
        'content', 'publish', 'published_at'
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
        $data['data']['created_at'] = time();
        $data['data']['updated_at'] = time();
        return $data;
    }

    /**
     * @param array $data
     *
     * @return array
     */
    protected function callBeforeUpdate(array $data = []): array
    {
        $data['data']['updated_at'] = time();
        return $data;
    }
}
