<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Domains\Author\Models\Author;
use Domains\Book\Models\Book;
use Domains\Genre\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * run
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'System Administrator',
            'email' => 'system@book-library.test',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        Author::factory(10)->create();
        Genre::factory(10)->create();
        Book::factory(10)->create();
    }
}
