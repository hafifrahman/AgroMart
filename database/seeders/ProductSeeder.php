<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Pupuk Organik Cair Super',
                'slug' => 'pupuk-organik-cair-super',
                'description' => 'Pupuk organik cair super untuk tanaman Anda.',
                'category_id' => 1,
                'price' => 75000,
                'image' => 'pupuk-organik-cair-super.png',
                'rating' => 4.8,
                'featured' => true,
            ],
            [
                'name' => 'Bibit Cabai Rawit Unggul',
                'slug' => 'bibit-cabai-rawit-unggul',
                'description' => 'Bibit cabai rawit unggul untuk hasil panen maksimal.',
                'category_id' => 2,
                'price' => 15000,
                'image' => 'bibit-cabai-rawit-unggul.png',
                'rating' => 4.9,
                'featured' => false,
            ],
            [
                'name' => 'Alat Semprot Hama Elektrik',
                'slug' => 'alat-semprot-hama-elektrik',
                'description' => 'Alat semprot hama elektrik untuk pertanian modern.',
                'category_id' => 3,
                'price' => 350000,
                'image' => 'alat-semprot-hama-elektrik.png',
                'rating' => 4.7,
                'featured' => true,
            ],
            [
                'name' => 'Sekop Baja Modern',
                'slug' => 'sekop-baja-modern',
                'description' => 'Sekop baja modern untuk pertanian efisien.',
                'category_id' => 3,
                'price' => 120000,
                'image' => 'sekop-baja-modern.jpg',
                'rating' => 4.6,
                'featured' => false,
            ],
            [
                'name' => 'Traktor Mini Tangan',
                'slug' => 'traktor-mini-tangan',
                'description' => 'Traktor mini tangan untuk pertanian modern.',
                'category_id' => 4,
                'price' => 7500000,
                'image' => 'traktor-mini-tangan.webp',
                'rating' => 5.0,
                'featured' => true,
            ],
            [
                'name' => 'Pupuk NPK Mutiara 16-16-16',
                'slug' => 'pupuk-npk-mutiara-16-16-16',
                'description' => 'Pupuk NPK Mutiara 16-16-16 untuk tanaman Anda.',
                'category_id' => 1,
                'price' => 150000,
                'image' => 'pupuk-npk-mutiara-16-16-16.png',
                'rating' => 4.8,
                'featured' => false,
            ],
            [
                'name' => 'Bibit Tomat Hibrida F1',
                'slug' => 'bibit-tomat-hibrida-f1',
                'description' => 'Bibit tomat hibrida F1 untuk hasil panen maksimal.',
                'category_id' => 2,
                'price' => 25000,
                'image' => 'bibit-tomat-hibrida-f1.png',
                'rating' => 4.7,
                'featured' => false,
            ],
            [
                'name' => 'Polybag Tahan Lama',
                'slug' => 'polybag-tahan-lama',
                'description' => 'Polybag tahan lama untuk pertanian.',
                'category_id' => 2,
                'price' => 30000,
                'image' => 'polybag-tahan-lama.png',
                'rating' => 4.5,
                'featured' => false,
            ],
        ]);
    }
}
