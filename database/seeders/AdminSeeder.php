<?php
namespace Database\Seeders;
use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\{Schema, DB};
use Illuminate\Database\Seeder;
class AdminSeeder extends Seeder {
    public function run() {
        Schema::disableForeignKeyConstraints();
        DB::table('admins')->truncate();
        Admin::factory()->create([
            'name' => 'Mostafa Ali',
            'email' => 'admin@app.com',
            'password' => bcrypt('123123'),
            'status' => 'active',
        ]);
        Admin::factory()->count(30)->create();
        Schema::enableForeignKeyConstraints();
    }
}