<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('Password123@'),
        ]);
        User::factory()->create([
            'id' => 2,
            'name' => 'Test User 2',
            'email' => 'test@example2.com',
            'password' => Hash::make('Password123@'),
        ]);
        
        Blog::factory(80)->create();
    }
}
