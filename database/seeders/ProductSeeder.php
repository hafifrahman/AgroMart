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
                'image' => 'https://placehold.co/400x400/22c55e/ffffff?text=Pupuk+Organik',
                'rating' => 4.8,
                'featured' => true,
            ],
            [
                'name' => 'Bibit Cabai Rawit Unggul',
                'slug' => 'bibit-cabai-rawit-unggul',
                'description' => 'Bibit cabai rawit unggul untuk hasil panen maksimal.',
                'category_id' => 2,
                'price' => 15000,
                'image' => 'https://placehold.co/400x400/f97316/ffffff?text=Bibit+Cabai',
                'rating' => 4.9,
                'featured' => false,
            ],
            [
                'name' => 'Alat Semprot Hama Elektrik',
                'slug' => 'alat-semprot-hama-elektrik',
                'description' => 'Alat semprot hama elektrik untuk pertanian modern.',
                'category_id' => 3,
                'price' => 350000,
                'image' => 'https://placehold.co/400x400/3b82f6/ffffff?text=Alat+Semprot',
                'rating' => 4.7,
                'featured' => true,
            ],
            [
                'name' => 'Cangkul Baja Modern',
                'slug' => 'cangkul-baja-modern',
                'description' => 'Cangkul baja modern untuk pertanian efisien.',
                'category_id' => 3,
                'price' => 120000,
                'image' => 'https://placehold.co/400x400/78716c/ffffff?text=Cangkul',
                'rating' => 4.6,
                'featured' => false,
            ],
            [
                'name' => 'Traktor Mini Tangan',
                'slug' => 'traktor-mini-tangan',
                'description' => 'Traktor mini tangan untuk pertanian modern.',
                'category_id' => 4,
                'price' => 7500000,
                'image' => 'https://placehold.co/400x400/ef4444/ffffff?text=Traktor+Mini',
                'rating' => 5.0,
                'featured' => true,
            ],
            [
                'name' => 'Pupuk NPK Mutiara 16-16-16',
                'slug' => 'pupuk-npk-mutiara-16-16-16',
                'description' => 'Pupuk NPK Mutiara 16-16-16 untuk tanaman Anda.',
                'category_id' => 1,
                'price' => 150000,
                'image' => 'https://placehold.co/400x400/22c55e/ffffff?text=Pupuk+NPK',
                'rating' => 4.8,
                'featured' => false,
            ],
            [
                'name' => 'Bibit Tomat Hibrida F1',
                'slug' => 'bibit-tomat-hibrida-f1',
                'description' => 'Bibit tomat hibrida F1 untuk hasil panen maksimal.',
                'category_id' => 2,
                'price' => 25000,
                'image' => 'https://placehold.co/400x400/f97316/ffffff?text=Bibit+Tomat',
                'rating' => 4.7,
                'featured' => false,
            ],
            [
                'name' => 'Polybag Tahan Lama (100 pcs)',
                'slug' => 'polybag-tahan-lama-100-pcs',
                'description' => 'Polybag tahan lama untuk pertanian.',
                'category_id' => 2,
                'price' => 30000,
                'image' => 'https://placehold.co/400x400/a3a3a3/ffffff?text=Polybag',
                'rating' => 4.5,
                'featured' => false,
            ],
        ]);
    }
}
