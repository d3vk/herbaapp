<?php

namespace Database\Seeders;

use App\Models\Merchant;
use Illuminate\Database\Seeder;

class MerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $merchants = [
            [
                'name' => 'CV PJ Ching Lung',
                'admin_id' => 2,
                'address' => 'Jl. Ir. Sutami 36A Surakarta',
                'phone' => '081111111111',
            ],
            [
                'name' => 'Olivia Jamu',
                'admin_id' => 6,
                'address' => 'Jl. Ir. Sutami 38A Surakarta',
                'phone' => '082222222222',
            ],
        ];

        foreach ($merchants as $key => $value) {
            Merchant::create($value);
            
        }
    }
}
