<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Article;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newsCategory = Category::where('slug', 'news')->first();
        $reviewCategory = Category::where('slug', 'review')->first();

        // Create the specific authors from the mockup
        $jack = User::updateOrCreate(
            ['email' => 'jack@guitarhero.com'],
            ['name' => 'Jack Daniels', 'password' => bcrypt('password123'), 'role' => 'admin']
        );
        $sarah = User::updateOrCreate(
            ['email' => 'sarah@guitarhero.com'],
            ['name' => 'Sarah Jenkins', 'password' => bcrypt('password123'), 'role' => 'admin']
        );
        $mike = User::updateOrCreate(
            ['email' => 'mike@guitarhero.com'],
            ['name' => 'Mike Torres', 'password' => bcrypt('password123'), 'role' => 'admin']
        );
        $alex = User::updateOrCreate(
            ['email' => 'alex@guitarhero.com'],
            ['name' => 'Alex Vance', 'password' => bcrypt('password123'), 'role' => 'admin']
        );

        $articles = [
            [
                'title' => 'The Evolution of High-Gain Amps',
                'category_id' => $reviewCategory->id,
                'content' => 'A deep dive into how circuit design has shifted to accommodate the aggressive tones of today\'s progressive metal. Modern high-gain amplifiers have evolved from simple tube circuits to multi-channel beasts that offer extreme saturation while retaining note definition. We explore the engineering breakthroughs behind these iconic lunchbox amps and head units.',
                'image' => 'article1.jpg',
                'author_id' => $jack->id,
                'status' => 'PUBLISHED',
                'published_at' => Carbon::create(2023, 10, 24),
                'created_at' => Carbon::create(2023, 10, 24),
            ],
            [
                'title' => 'The Return of the Offset',
                'category_id' => $newsCategory->id,
                'content' => 'We sat down with lead guitarist Sarah Jenkins to discuss her pedalboard secrets for their upcoming stadium tour. From vintage fuzz boxes to modern digital multi-effects, Sarah walks us through her signal chain, showing how she achieves the ethereal, atmospheric tones that define their latest double album.',
                'image' => 'article2.jpg',
                'author_id' => $sarah->id,
                'status' => 'DRAFT',
                'published_at' => null,
                'created_at' => Carbon::create(2023, 10, 22),
            ],
            [
                'title' => 'Boutique Pedals: Hype or Reality?',
                'category_id' => $newsCategory->id,
                'content' => 'How raw tone woods are becoming harder to source, and what it means for custom shop wait times next year. With international trade regulations tightening and deforestation affecting rare species like Madagascar Rosewood and Honduran Mahogany, boutique luthiers are seeking alternative materials like toasted maple and richlite.',
                'image' => 'article3.jpg',
                'author_id' => $mike->id,
                'status' => 'PUBLISHED',
                'published_at' => Carbon::create(2023, 10, 18),
                'created_at' => Carbon::create(2023, 10, 18),
            ],
            [
                'title' => 'Demystifying Studio Compression',
                'category_id' => $reviewCategory->id,
                'content' => 'Unlock the secrets of the pentatonic scale and how to combine it with modes to build legendary rock solos. This guide provides finger exercises, phrasing tips, and classic lick examples inspired by guitar giants like Jimi Hendrix, Jimmy Page, and Slash.',
                'image' => 'article4.jpg',
                'author_id' => $alex->id,
                'status' => 'REVIEW',
                'published_at' => null,
                'created_at' => Carbon::create(2023, 10, 15),
            ],
            [
                'title' => 'String Gauge Myths Busted',
                'category_id' => $newsCategory->id,
                'content' => 'Keep your guitar in perfect tune with our step-by-step guide to adjusting action, intonation, and relief. Whether you have a Floyd Rose, a Tune-O-Matic, or a vintage-style tremolo, we show you the exact measurements and tools needed for a professional setup.',
                'image' => 'article5.jpg',
                'author_id' => $jack->id,
                'status' => 'PUBLISHED',
                'published_at' => Carbon::create(2023, 10, 10),
                'created_at' => Carbon::create(2023, 10, 10),
            ],
            [
                'title' => 'Mastering the Pentatonic Scale for Rock Soloing',
                'category_id' => $newsCategory->id,
                'content' => 'Unlock the secrets of the pentatonic scale and how to combine it with modes to build legendary rock solos. This guide provides finger exercises, phrasing tips, and classic lick examples.',
                'image' => 'article6.jpg',
                'author_id' => $jack->id,
                'status' => 'PUBLISHED',
                'published_at' => Carbon::create(2023, 10, 5),
                'created_at' => Carbon::create(2023, 10, 5),
            ],
            [
                'title' => 'A Guide to Setting Up Your Guitar Bridge',
                'category_id' => $reviewCategory->id,
                'content' => 'Keep your guitar in perfect tune with our step-by-step guide to adjusting action, intonation, and relief.',
                'image' => 'article7.jpg',
                'author_id' => $sarah->id,
                'status' => 'PUBLISHED',
                'published_at' => Carbon::create(2023, 10, 2),
                'created_at' => Carbon::create(2023, 10, 2),
            ],
            [
                'title' => 'The 2024 Shredder\'s Axe Guide',
                'category_id' => $reviewCategory->id,
                'content' => 'We put the top 5 modern metal guitars through their paces in our tone laboratory.',
                'image' => 'article8.jpg',
                'author_id' => $mike->id,
                'status' => 'PUBLISHED',
                'published_at' => Carbon::create(2023, 9, 28),
                'created_at' => Carbon::create(2023, 9, 28),
            ]
        ];

        foreach ($articles as $art) {
            Article::updateOrCreate(
                ['slug' => Str::slug($art['title'])],
                [
                    'title' => $art['title'],
                    'content' => $art['content'],
                    'image' => $art['image'],
                    'category_id' => $art['category_id'],
                    'author_id' => $art['author_id'],
                    'status' => $art['status'],
                    'published_at' => $art['published_at'],
                    'created_at' => $art['created_at'],
                ]
            );
        }
    }
}
