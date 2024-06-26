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
        // User::factory(10)->create();
        
        
        User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
            // 'toko_id'=> 1,
            'usertype' => 'user',
            'phone' => '088888888',
            'address' => 'Solo'
        ]);

        User::create([
            'name' => 'Seller',
            'email' => 'seller@gmail.com',
            'password' => Hash::make('password'),
            // 'toko_id'=> 1,
            'usertype' => 'user',
            'phone' => '088888888',
            'address' => 'Solo'
        ]);
        
        Toko::create([
            'name'=>'aaaaa',
            'user_id'=>1
        ]);

        Toko::create([
            'name'=>'bbbbb',
            'user_id'=>2
        ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'usertype'=> 'admin',
            'password' => Hash::make('admin123')
        ]);

        Product::create([
            'name'=>'Contoh',
            'stock'=>5,
            'price'=>5000,
            'toko_id'=>1
        ]);

        Product::create([
            'name'=>'Contoh1',
            'stock'=>5,
            'price'=>7000,
            'toko_id'=>1
        ]);

        Product::create([
            'name'=>'Contoh2',
            'stock'=>5,
            'price'=>7000,
            'toko_id'=>2
        ]);


    }
}
