<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Domains\Book\Models\Book;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'System Administrator',
            'email' => 'system@book-library.test',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        Book::factory(100)->create();
    }
}
