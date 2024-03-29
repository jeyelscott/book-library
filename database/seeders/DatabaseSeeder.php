<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Domains\Author\Projections\Author;
use Domains\Book\Projections\Book;
use Domains\Customer\Models\Customer;
use Domains\Genre\Projections\Genre;
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

        // Customer::factory(20)->create();
        // Author::factory(50)->create();
        // Genre::factory(20)->create();
        // Book::factory(100)->create();
    }
}
