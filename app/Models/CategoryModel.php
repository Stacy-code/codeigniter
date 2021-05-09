<?php

namespace App\Models;

use CodeIgniter\Model;

/**
 * Class CategoryModel
 *
 * @package App\Models
 */
class CategoryModel extends Model
{
    /**
     * @var string $table
     */
    protected $table = 'category';

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
        'parent_id', 'name', 'description'
    ];
}
