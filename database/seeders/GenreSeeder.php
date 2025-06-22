<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenreSeeder extends Seeder
{
    public function run()
    {
        $genres = [
            'Fiction',
            'Non-fiction',
            'Romance',
            'Mystery',
            'Fantasy',
            'Science Fiction',
            'Biography',
            'History',
            'Self-Help',
            'Thriller',
        ];

        foreach ($genres as $name) {
            Genre::firstOrCreate(['name' => $name]); // avoid duplicates
        }
    }
}
