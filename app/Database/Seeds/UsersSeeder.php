<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

/**
 * Class UsersSeeder
 *
 * @package App\Database\Seeds
 */
class UsersSeeder extends Seeder
{
    /**
     * @return mixed|void
     */
    public function run()
    {
        $data = [
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password_hash' => password_hash('admin', PASSWORD_DEFAULT),
            'activate_hash' => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'active' => 1
        ];

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}