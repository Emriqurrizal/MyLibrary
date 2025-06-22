<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recommendation;

class RecommendationSeeder extends Seeder
{
    public function run()
    {
        $books = [
            ['title' => 'Atomic Habits', 'author' => 'James Clear', 'genre' => 'Self-Help', 'description' => 'Build good habits and break bad ones.'],
            ['title' => 'Deep Work', 'author' => 'Cal Newport', 'genre' => 'Self-Help', 'description' => 'Focused success in a distracted world.'],
            ['title' => 'The Alchemist', 'author' => 'Paulo Coelho', 'genre' => 'Fiction', 'description' => 'A magical journey of finding one’s destiny.'],
            ['title' => 'To Kill a Mockingbird', 'author' => 'Harper Lee', 'genre' => 'Fiction', 'description' => 'Justice and racial inequality in the Deep South.'],
            ['title' => '1984', 'author' => 'George Orwell', 'genre' => 'Science Fiction', 'description' => 'Dystopian surveillance and totalitarianism.'],
            ['title' => 'Pride and Prejudice', 'author' => 'Jane Austen', 'genre' => 'Romance', 'description' => 'Love and class in Georgian England.'],
            ['title' => 'The Subtle Art of Not Giving a F*ck', 'author' => 'Mark Manson', 'genre' => 'Self-Help', 'description' => 'How to focus on what truly matters.'],
            ['title' => 'Sapiens', 'author' => 'Yuval Noah Harari', 'genre' => 'Non-fiction', 'description' => 'A brief history of humankind.'],
            ['title' => 'Educated', 'author' => 'Tara Westover', 'genre' => 'Biography', 'description' => 'A woman’s journey from isolation to education.'],
            ['title' => 'The Power of Now', 'author' => 'Eckhart Tolle', 'genre' => 'Self-Help', 'description' => 'Living in the present moment.'],

            ['title' => 'Becoming', 'author' => 'Michelle Obama', 'genre' => 'Biography', 'description' => 'Memoir by the former First Lady.'],
            ['title' => 'Thinking, Fast and Slow', 'author' => 'Daniel Kahneman', 'genre' => 'Non-fiction', 'description' => 'How we think and make decisions.'],
            ['title' => 'Rich Dad Poor Dad', 'author' => 'Robert Kiyosaki', 'genre' => 'Non-fiction', 'description' => 'Personal finance lessons through two dads.'],
            ['title' => 'Can’t Hurt Me', 'author' => 'David Goggins', 'genre' => 'Biography', 'description' => 'Mental toughness from a Navy SEAL.'],
            ['title' => 'Ikigai', 'author' => 'Héctor García', 'genre' => 'Self-Help', 'description' => 'The Japanese way to live with purpose.'],
            ['title' => 'The Hobbit', 'author' => 'J.R.R. Tolkien', 'genre' => 'Fantasy', 'description' => 'A hobbit’s unexpected journey.'],
            ['title' => 'The Catcher in the Rye', 'author' => 'J.D. Salinger', 'genre' => 'Fiction', 'description' => 'Teen alienation and rebellion.'],
            ['title' => 'The Great Gatsby', 'author' => 'F. Scott Fitzgerald', 'genre' => 'Fiction', 'description' => 'The illusion of the American dream.'],
            ['title' => 'The 7 Habits of Highly Effective People', 'author' => 'Stephen R. Covey', 'genre' => 'Self-Help', 'description' => 'Principles for personal effectiveness.'],
            ['title' => 'Start With Why', 'author' => 'Simon Sinek', 'genre' => 'Self-Help', 'description' => 'Great leaders inspire by focusing on purpose.'],

            ['title' => 'Dune', 'author' => 'Frank Herbert', 'genre' => 'Science Fiction', 'description' => 'Epic interstellar political struggle.'],
            ['title' => 'The Silent Patient', 'author' => 'Alex Michaelides', 'genre' => 'Mystery', 'description' => 'A woman’s silence after a shocking murder.'],
            ['title' => 'The Midnight Library', 'author' => 'Matt Haig', 'genre' => 'Fantasy', 'description' => 'Exploring alternate lives through books.'],
            ['title' => 'The Four Agreements', 'author' => 'Don Miguel Ruiz', 'genre' => 'Self-Help', 'description' => 'A code of conduct for personal freedom.'],
            ['title' => 'Man’s Search for Meaning', 'author' => 'Viktor Frankl', 'genre' => 'Non-fiction', 'description' => 'Finding purpose through suffering.'],
            ['title' => 'Crushing It!', 'author' => 'Gary Vaynerchuk', 'genre' => 'Non-fiction', 'description' => 'Building personal brands online.'],
            ['title' => 'The Fault in Our Stars', 'author' => 'John Green', 'genre' => 'Romance', 'description' => 'Teen love with a tragic twist.'],
            ['title' => 'Harry Potter and the Sorcerer’s Stone', 'author' => 'J.K. Rowling', 'genre' => 'Fantasy', 'description' => 'The beginning of a magical journey.'],
            ['title' => 'A Brief History of Time', 'author' => 'Stephen Hawking', 'genre' => 'Non-fiction', 'description' => 'Understanding black holes and time.'],
            ['title' => 'Gone Girl', 'author' => 'Gillian Flynn', 'genre' => 'Thriller', 'description' => 'A marriage gone terrifyingly wrong.'],
        ];

        foreach ($books as $book) {
            Recommendation::create($book);
        }
    }
}
