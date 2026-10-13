<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;

class EcommerceSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Buat Kategori
        $elektronik = Category::create([
            'name' => 'Elektronik',
            'slug' => 'elektronik',
        ]);

        $pakaian = Category::create([
            'name' => 'Pakaian',
            'slug' => 'pakaian',
        ]);

        $makanan = Category::create([
            'name' => 'Makanan & Minuman',
            'slug' => 'makanan-minuman',
        ]);

        // 2. Buat Produk dengan Gambar dari Unsplash
        Product::create([
            'category_id' => $elektronik->id,
            'name' => 'Smartphone Android 5G',
            'slug' => 'smartphone-android-5g',
            'description' => 'Layar OLED 6.7 inci, RAM 8GB, Storage 256GB, Baterai 5000mAh.',
            'price' => 3500000,
            'stock' => 15,
            'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=500&auto=format&fit=crop',
        ]);

        Product::create([
            'category_id' => $elektronik->id,
            'name' => 'Headphone Wireless Bluetooth',
            'slug' => 'headphone-wireless-bluetooth',
            'description' => 'Fitur Noise Cancelling dengan kualitas suara jernih dan bass mantap.',
            'price' => 750000,
            'stock' => 20,
            'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w=500&auto=format&fit=crop',
        ]);

        Product::create([
            'category_id' => $pakaian->id,
            'name' => 'Kaos Polos Cotton Combed 30s',
            'slug' => 'kaos-polos-cotton-combed-30s',
            'description' => 'Bahan adem, nyaman dipakai sehari-hari, pilihan warna beragam.',
            'price' => 65000,
            'stock' => 50,
            'image' => 'https://images.unsplash.com/photo-1521572267360-ee0c2909d518?w=500&auto=format&fit=crop',
        ]);

        Product::create([
            'category_id' => $pakaian->id,
            'name' => 'Jaket Denim Oversize',
            'slug' => 'jaket-denim-oversize',
            'description' => 'Bahan denim berkualitas tinggi dengan potongan gaya kekinian.',
            'price' => 250000,
            'stock' => 10,
            'image' => 'https://images.unsplash.com/photo-1576995853123-5a10305d93c0?w=500&auto=format&fit=crop',
        ]);

        Product::create([
            'category_id' => $makanan->id,
            'name' => 'Kopi Arabika Premium 250g',
            'slug' => 'kopi-arabika-premium-250g',
            'description' => 'Biji kopi pilihan roasted segar dengan rasa yang mantap.',
            'price' => 85000,
            'stock' => 30,
            'image' => 'https://images.unsplash.com/photo-1559056199-641a0ac8b55e?w=500&auto=format&fit=crop',
        ]);
    }
}