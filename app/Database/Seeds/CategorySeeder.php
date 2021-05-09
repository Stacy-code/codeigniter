<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Class CategorySeeder
 *
 * @package App\Database\Seeds
 */
class CategorySeeder extends Seeder
{
    /**
     * @var string $table
     */
    private $table = 'category';

    /**
     * @return mixed|void
     */
    public function run()
    {
        $data = [
            'parent_id' => null,
            'name' => 'Корень категорий',
            'description' => 'Корень всех категорий'
        ];

        // Using Query Builder
        $this->db->table($this->table)->insert($data);
    }
}
