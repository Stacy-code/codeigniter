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
    public function run()
    {
        $data = [
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password_hash' => password_hash('admin', PASSWORD_DEFAULT),
            'activate_hash' => random_string('alnum', 32),
            'active' => 1
        ];

        // Simple Queries
        $this->db->query("INSERT INTO users (`name`, `email`, `password_hash`, `activate_hash`, `active`) 
            VALUES(:name:, :email:, :password_hash:, :activate_hash:, :active:)", $data);

        // Using Query Builder
        $this->db->table('users')->insert($data);
    }
}