<?php
namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
class AdminFactory extends Factory {
    public function definition() {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => bcrypt('123123'), // password
            'remember_token' => Str::random(10),
            'status' => fake()->randomElement(['not_active','banned']),
        ];
    }

    public function unverified() {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}