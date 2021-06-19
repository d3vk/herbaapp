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
                'name' => 'Kayu Manis Ajaib',
                'merchant_id' => 1,
                'slug' => '20210614-Kayu-Manis-Ajaib',
                'price' => 226000,
                'status' => 'Tersedia',
                'short_description' => 'Regulator Gula Darah',
                'description' => 'Selain rasanya yang lezat, kayu manis juga memiliki banyak manfaat untuk kesehatan. Senyawa fenolik yang ditemukan di dalam ekstrak kayu manis membantu menjaga kadar gula darah agar tetap sehat dan melancarkan peredaran darah. Mempertahankan kadar gula dalam darah tetap sehat itu sangat penting untuk mendapatkan tubuh yang sehat, sirkulasi darah yang lancar, dan sistem saraf yang berfungsi dengan baik.',
                'good_for' => 'Gula Darah, Kesehatan Peredaran Darah',
                'how_to' => 'Konsumsi 1 kapsul 2 kali sehari',
                'ingredients' => 'Kayu Manis',
                'images' => '["20210614_Kayu_Manis_1.jpg","20210614_Kayu_Manis_2.jpg","20210614_Kayu_Manis_3.jpg"]',
            ],
            [
                'name' => 'Temulawak Ajaib',
                'merchant_id' => 1,
                'slug' => '20210614-Temulawak-Ajaib',
                'price' => 185000,
                'status' => 'Tersedia',
                'short_description' => 'Kesehatan Liver dan Detoksifikasi',
                'description' => 'Temulawak kaya akan kurkumin dan xanthorrhizol, ekstrak temulawak membantu memelihara kesehatan hati dengan cara melindungi hati dari kerusakan. Temulawak juga kaya akan antioksidan dan mengandung sifat antivirus, antibakteri serta anti-inflamasi. Manfaat temulawak juga dipercaya membantu menurunkan kadar kolesterol dalam darah.',
                'good_for' => 'Perlindungan Liver, Pereda Nyeri Otot',
                'how_to' => 'Konsumsi 1 kapsul 3 kali sehari',
                'ingredients' => 'Temulawak',
                'images' => '["20210614_Temulawak_1.jpg"]',
            ],
            [
                'name' => 'Kulit Manggis Ajaib',
                'merchant_id' => 1,
                'slug' => '20210614-Kulit-Manggis-Ajaib',
                'price' => 210000,
                'status' => 'Tersedia',
                'short_description' => 'Daya Tahan Tubuh dan Kulit Sehat',
                'description' => 'Kulit manggis kaya Xanthone yang memiliki sifat antioksidan, antibakteri dan anti-inflamasi. Antioksidan kuat di kulit manggis ini berguna untuk merusak partikel radikal bebas di dalam tubuh, merangsang respon imun yang sehat di dalam tubuh, dan memelihara kesehatan kulit dari dalam.',
                'good_for' => 'Daya Tahan Tubuh, Perawatan Kulit',
                'how_to' => 'Konsumsi 2 kapsul 2 kali sehari',
                'ingredients' => 'Kulit Manggis',
                'images' => '["20210614_Kulit_Manggis_1.jpg","20210614_Kulit_Manggis_2.jpg"]',
            ],
            [
                'name' => 'Jinten Hitam Ajaib',
                'merchant_id' => 1,
                'slug' => '20210614-Jinten-Hitam-Ajaib',
                'price' => 125000,
                'status' => 'Tersedia',
                'short_description' => 'Daya Tahan Tubuh',
                'description' => 'Manfaat jinten hitam sangat baik untuk Anda yang aktif dan dinamis. Jinten hitam berfungsi untuk meningkatkan sistem kekebalan tubuh dengan meningkatkan produksi sel-sel yang bekerja untuk meningkatkan kekebalan tubuh. Jinten hitam juga kaya akan antioksidan dan nutrient alami, yang dapat menangkal radikal bebas dan melengkapi kebutuhan nutrient dalam tubuh.',
                'good_for' => 'Daya Tahan Tubuh',
                'how_to' => 'Konsumsi 2 kapsul 2 kali sehari',
                'ingredients' => 'Jinten Hitam',
                'images' => '["20210614_Jinten_Hitam_1.jpg","20210614_Jinten_Hitam_2.jpg"]',
            ],
            [
                'name' => 'Jahe Merah Ajaib',
                'merchant_id' => 1,
                'slug' => '20210614-Jahe-Merah-Ajaib',
                'price' => 150000,
                'status' => 'Tersedia',
                'short_description' => 'Kesehatan Pencernaan dan Pereda Nyeri',
                'description' => 'Jahe merah yang biasanya ditemukan di dapur kita, ekstrak jahe merah menawarkan banyak manfaat kesehatan. Manfaat jahe merah baik untuk mengobati gejala-gejala gangguan pencernaan seperti ketidaknyamanan dibagian perut seperti kembung, mulas dan mual. Khasiat jahe merah juga dikenal dapat meredakan nyeri otot, mengurangi demam, mencegah atau mengobati flu dan sakit tenggorokan.',
                'good_for' => 'Gangguan Pencernaan, Sakit Otot, Demam, Masuk Angin, Sakit Tenggorokan',
                'how_to' => 'Konsumsi 1 kapsul 3 kali sehari',
                'ingredients' => 'Jahe Merah',
                'images' => '["20210614_Jahe_Merah_1.jpg","20210614_Jahe_Merah_2.jpg"]',
            ],
            [
                'name' => 'Jinten Hitam Langgeng',
                'merchant_id' => 2,
                'slug' => '20210614-Jinten-Hitam-Langgeng',
                'price' => 125000,
                'status' => 'Tersedia',
                'short_description' => 'Daya Tahan Tubuh',
                'description' => 'Manfaat jinten hitam sangat baik untuk Anda yang aktif dan dinamis. Jinten hitam berfungsi untuk meningkatkan sistem kekebalan tubuh dengan meningkatkan produksi sel-sel yang bekerja untuk meningkatkan kekebalan tubuh. Jinten hitam juga kaya akan antioksidan dan nutrient alami, yang dapat menangkal radikal bebas dan melengkapi kebutuhan nutrient dalam tubuh.',
                'good_for' => 'Daya Tahan Tubuh',
                'how_to' => 'Konsumsi 2 kapsul 2 kali sehari',
                'ingredients' => 'Jinten Hitam',
                'images' => '["20210614_Jinten_Hitam_1.jpg","20210614_Jinten_Hitam_2.jpg"]',
            ],
            [
                'name' => 'Jahe Merah Langgeng',
                'merchant_id' => 2,
                'slug' => '20210614-Jahe-Merah-Langgeng',
                'price' => 150000,
                'status' => 'Tersedia',
                'short_description' => 'Kesehatan Pencernaan dan Pereda Nyeri',
                'description' => 'Jahe merah yang biasanya ditemukan di dapur kita, ekstrak jahe merah menawarkan banyak manfaat kesehatan. Manfaat jahe merah baik untuk mengobati gejala-gejala gangguan pencernaan seperti ketidaknyamanan dibagian perut seperti kembung, mulas dan mual. Khasiat jahe merah juga dikenal dapat meredakan nyeri otot, mengurangi demam, mencegah atau mengobati flu dan sakit tenggorokan.',
                'good_for' => 'Gangguan Pencernaan, Sakit Otot, Demam, Masuk Angin, Sakit Tenggorokan',
                'how_to' => 'Konsumsi 1 kapsul 3 kali sehari',
                'ingredients' => 'Jahe Merah',
                'images' => '["20210614_Jahe_Merah_1.jpg","20210614_Jahe_Merah_2.jpg"]',
            ],
        ];

        foreach ($product as $key => $value) {
            Product::create($value);
        }
    }
}
