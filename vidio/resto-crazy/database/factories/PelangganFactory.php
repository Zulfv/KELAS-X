<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\pelanggan>
 */
class PelangganFactory extends Factory
{
    /**
     * 
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           'pelanggan' => fake()->name(),
           'alamat' => fake()->name(),
           'telp' => fake()->phoneNumber(),
            'password' => Hash::make('password'),
            'email' => fake()->unique()->safeEmail(),
        ];
    }
}
