<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Administrator',
                'email' => 'admin@herba.app',
                'password' => bcrypt('123'),
                'is_admin' => 1,
            ],
            [
                'name' => 'Langgeng Siregar',
                'email' => 'langgeng@herba.app',
                'password' => bcrypt('123'),
            ],
            [
                'name' => 'Olga Saptono',
                'email' => 'olga@herba.app',
                'password' => bcrypt('123'),
            ],
            [
                'name' => 'Rizki Hutapea',
                'email' => 'rizki@herba.app',
                'password' => bcrypt('123'),
            ],
            [
                'name' => 'Dinda Andriani',
                'email' => 'dinda@herba.app',
                'password' => bcrypt('123'),
            ],
            [
                'name' => 'Olivia Andriani',
                'email' => 'olivia@herba.app',
                'is_penyedia_jasa' => true,
                'password' => bcrypt('123'),
            ]
        ];

        foreach ($user as $key => $value) {
            User::create($value);
            
        }
    }
}
