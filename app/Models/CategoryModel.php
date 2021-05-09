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

    /**
     * @param int|null $excludeID
     *
     * @return array
     */
    public function getListOptions(int $excludeID = null): array
    {
        $items = is_null($excludeID)
            ? $this->findAll()
            : $this->where('id !=', $excludeID)->findAll();

        $options = [];
        if (!empty($items)) {
            foreach ($items as $item) {
                $options[$item['id']] = $item['name'];
            }
        }

        return $options;
    }
}
