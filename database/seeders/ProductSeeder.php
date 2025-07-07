<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $images = [
            '1651192038_dTixJmKo4M.jpg',
            '1682233459_LmAPxWdP3C.jpg',
            '1751594138_EKxeNbfk4F.jpg',
            '1712233378_TnvDeuUt6R.jpg',
            '1751595823_H6j38ybqw2.jpg',
        ];

        $products = [
            [
                'name' => 'Ebook Panduan Laravel Dasar',
                'price' => 50000,
                'description' => 'Panduan lengkap belajar Laravel dari nol hingga CRUD.',
            ],
            [
                'name' => 'Template CV Modern',
                'price' => 25000,
                'description' => 'Template CV profesional dan ATS friendly dalam format Word dan PDF.',
            ],
            [
                'name' => 'Preset Lightroom Mobile',
                'price' => 15000,
                'description' => 'Kumpulan preset Lightroom untuk mempercantik foto di HP.',
            ],
            [
                'name' => 'Font Bundle Kreatif',
                'price' => 30000,
                'description' => 'Bundle 20+ font unik dan elegan untuk desain grafis.',
            ],
            [
                'name' => 'Lisensi Software Akuntansi',
                'price' => 200000,
                'description' => 'Lisensi resmi untuk software akuntansi versi standar.',
            ],
            [
                'name' => 'UI Kit Figma - Dashboard Admin',
                'price' => 80000,
                'description' => 'Desain UI dashboard siap pakai untuk proyek web atau aplikasi.',
            ],
            [
                'name' => 'Mockup Produk Digital',
                'price' => 40000,
                'description' => 'Mockup berkualitas tinggi untuk produk digital seperti ebook, app, dll.',
            ],
            [
                'name' => 'Toolkit Content Creator',
                'price' => 75000,
                'description' => 'Toolkit berisi template, script, dan panduan untuk content creator.',
            ],
            [
                'name' => 'Template Invoice Bisnis',
                'price' => 20000,
                'description' => 'Template invoice elegan dalam Excel & PDF untuk bisnis UMKM.',
            ],
            [
                'name' => 'Video Tutorial UI/UX Design',
                'price' => 100000,
                'description' => 'Kursus video dasar-dasar UI/UX Design dari nol.',
            ],
        ];

        foreach ($products as &$product) {
            $product['image'] = 'products/' . $images[array_rand($images)];
            $randomTime = Carbon::now()->subDays(rand(0, 7))->setTime(rand(0, 23), rand(0, 59), rand(0, 59));
            $product['created_at'] = $randomTime;
            $product['updated_at'] = $randomTime;
        }

        DB::table('products')->insert($products);
    }
}
