<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Toko>
 */
class TokoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userId = User::pluck('id')->random();

        // Mendapatkan pengguna acak berdasarkan ID
        $user = User::find($userId);

        return [
            // 'name' => $user->name. 'shop',
            'name'=>fake()->unique()->firstName(),
            'phone' => fake()->unique()->phoneNumber(),
            'address' => fake()->address(),
            'user_id'=> mt_rand(1,4)
        ];
    }
}
