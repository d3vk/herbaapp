<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'id' => 2,
                'name' => 'CV PJ Ching Lung',
                'profile' => 'Berdiri sejak 2020',
                'phone' => '082222222222',
                'address' => 'Jl. Ir. Sutami 38A Surakarta',
            ],
        ];

        foreach ($companies as $key => $value) {
            Company::create($value);
            
        }
    }
}
