<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Naykel\Shopit\Models\Product;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Product::factory(10)->released()->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
