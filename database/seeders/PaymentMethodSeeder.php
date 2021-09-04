<?php

namespace Database\Seeders;

use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
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
                'payment_name' => 'BNI',
                'payment_method_img' => 'bni.png',
            ],
            [
                'payment_name' => 'BCA',
                'payment_method_img' => 'bca.png',
            ],
            [
                'payment_name' => 'BRI',
                'payment_method_img' => 'bri.png',
            ],
        ];

        foreach ($methods as $key => $value) {
            Payment::create($value);
            
        }
    }
}
