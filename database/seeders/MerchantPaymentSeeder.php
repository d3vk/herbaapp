<?php

namespace Database\Seeders;

use App\Models\MerchantPayment;
use Illuminate\Database\Seeder;

class MerchantPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $methods = [
            [
                'merchant_id' => 1,
                'method_id' => 1,
                'account' => '12345678'
            ],
            [
                'merchant_id' => 1,
                'method_id' => 3,
                'account' => '12345678'
            ],
            [
                'merchant_id' => 2,
                'method_id' => 1,
                'account' => '12345678'
            ],
        ];

        foreach ($methods as $key => $value) {
            MerchantPayment::create($value);
            
        }
    }
}
