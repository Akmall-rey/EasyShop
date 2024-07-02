<?php

namespace Database\Seeders;

use App\Models\Toko;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(4)->create();
        Toko::factory(4)->create();
        Product::factory(10)->create();
        
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            'usertype' => 'user',
            'phone' => '088888888',
            'address' => 'Solo'
        ]);

        User::create([
            'name' => 'User2',
            'email' => 'user2@gmail.com',
            'password' => Hash::make('password'),
            'usertype' => 'user',
            'phone' => '088888889',
            'address' => 'Solo'
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'usertype'=> 'admin',
            'password' => Hash::make('password')
        ]);

        Toko::create([
            'name'=>'aaaaa',
            'user_id'=>5
        ]);

        Product::create([
            'name'=>'Produk 1',
            'stock'=>5,
            'price'=>5000,
            'toko_id'=>5
        ]);

        Product::create([
            'name'=>'Produk 2',
            'stock'=>5,
            'price'=>7000,
            'toko_id'=>5
        ]);

    }
}
