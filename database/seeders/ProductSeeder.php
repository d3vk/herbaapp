<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = [
            [
                'name' => 'Ma Yen',
                'merchant_id' => 1,
                'slug' => '20210627-Ma-Yen',
                'price' => 75000,
                'status' => 'Tersedia',
                'short_description' => 'Meringankan gangguan lambung',
                'description' => 'Ma Yen dapat digunakan untuk meringankan gangguan lambung seperti maag atau gastritis. Dapat juga digunakan untuk mengeringkan luka dalam pasca operasi. Selain itu dapat menambah nafsu makan dan menyehatkan pencernaan.',
                'good_for' => 'Gangguan lambung, luka pasca operasi',
                'how_to' => 'Minum 2 x 2 kapsul setelah makan. Minum dengan air hangat.',
                'ingredients' => 'Curcuma xanthorrhiza rhizoma',
                'images' => '["20210627_ma_yen.png"]',
            ],
            [
                'name' => 'Stimmax',
                'merchant_id' => 2,
                'slug' => '20210627-Stimmax',
                'price' => 100000,
                'status' => 'Tersedia',
                'short_description' => 'Membantu memelihara daya tahan tubuh',
                'description' => 'Selain membantu memelihara daya tahan tubuh, Stimmax dapat digunakan untuk membantu menyembuhkan penyakit yang disebabkan menurunnya sistem kekebalan tubuh seperti masuk angin, flu, batuk, pilek. Meningkatkan CD4 dan membantu pemulihan pasien HIV, DBD, Chikungunya dan hepatitis.',
                'good_for' => 'Daya tahan tubuh',
                'how_to' => 'Minum 2 x 2 kapsul setelah makan. Minum dengan air hangat.',
                'ingredients' => 'Zingiber officiale rhizoma',
                'images' => '["20210627_stimmax.png"]',
            ],
            [
                'name' => 'Yung Tens',
                'merchant_id' => 2,
                'slug' => '20210627-Yung-Tens',
                'price' => 70000,
                'status' => 'Tersedia',
                'short_description' => 'Meringankan gejala hipertensi',
                'description' => 'Selain meringankan gejala hipertensi, Yung Tens dapat digunakan untuk melancarkan peredaran darah, mengurangu resiko penyumbatan jantung dan memelihara pemulihan stroke.',
                'good_for' => 'Gejala hipertensi',
                'how_to' => 'Minum 2 x 2 kapsul setelah makan. Minum dengan air hangat.',
                'ingredients' => 'Centella asiatica herba',
                'images' => '["20210627_yung_tens.png"]',
            ],
        ];

        foreach ($product as $key => $value) {
            Product::create($value);
        }
    }
}
