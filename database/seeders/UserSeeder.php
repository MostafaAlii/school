<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\{Schema, DB};
use Illuminate\Database\Seeder;
class UserSeeder extends Seeder {
    public function run() {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        User::factory()->create([
            'name' => 'Mostafa Ali User',
            'email' => 'user@app.com',
            'password' => bcrypt('123123'),
            'status' => 'active',
        ]);
        User::factory()->count(30)->create();
        Schema::enableForeignKeyConstraints();
    }
}