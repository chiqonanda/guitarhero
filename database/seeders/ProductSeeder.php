<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $electric = Category::where('slug', 'electric-guitar')->first();
        $acoustic = Category::where('slug', 'acoustic-guitar')->first();
        $bass = Category::where('slug', 'bass')->first();

        $products = [
            [
                'name' => 'Obsidian V-Core 7',
                'category_id' => $electric->id,
                'description' => 'Built for modern progressive metal players who demand clean articulation at low tunings. Features active pickups, a thin-U profile neck, and a multi-scale fretboard for maximum comfort.',
                'price' => 1899.00,
                'stock' => 5,
                'image' => 'product1.jpg',
                'brand' => 'Obsidian',
                'body_material' => 'Mahogany',
            ],
            [
                'name' => 'Volt Classic T',
                'category_id' => $electric->id,
                'description' => 'A classic body shape with modern hot-rodded electronics. Delivers that iconic single-coil twang but with extra power to drive your favorite tube amp into sweet overdrive.',
                'price' => 2149.00,
                'stock' => 3,
                'image' => 'product2.jpg',
                'brand' => 'Volt',
                'body_material' => 'Alder',
            ],
            [
                'name' => 'Custom Shop SC \'88',
                'category_id' => $electric->id,
                'description' => 'A premium master-built guitar featuring a hand-selected flamed maple top. Meticulously wired with vintage PAF-style humbuckers for the ultimate classic rock tone.',
                'price' => 4500.00,
                'stock' => 2,
                'image' => 'product3.jpg',
                'brand' => 'Custom Shop',
                'body_material' => 'Flamed Maple',
            ],
            [
                'name' => 'Djent Machine 8',
                'category_id' => $electric->id,
                'description' => 'An 8-string monster designed for down-tuned riffage. Equipped with high-output passive pickups and a neck reinforced with carbon fiber rods for total stability.',
                'price' => 1850.00,
                'stock' => 4,
                'image' => 'product4.jpg',
                'brand' => 'Djent',
                'body_material' => 'Basswood',
            ],
            [
                'name' => 'Aero Acoustic 6',
                'category_id' => $acoustic->id,
                'description' => 'A rich, resonant dreadnought acoustic guitar. Handcrafted with solid Sitka Spruce and Mahogany back and sides, offering a full range of warm tones.',
                'price' => 1200.00,
                'stock' => 6,
                'image' => 'product5.jpg',
                'brand' => 'Aero',
                'body_material' => 'Mahogany',
            ],
            [
                'name' => 'Thunder Bass V',
                'category_id' => $bass->id,
                'description' => 'A 5-string active bass guitar designed for heavy rock and metal. Features a powerful preamp with 3-band EQ, giving you total control over your low-end rumble.',
                'price' => 1599.00,
                'stock' => 5,
                'image' => 'product6.jpg',
                'brand' => 'Thunder',
                'body_material' => 'Alder',
            ],
            [
                'name' => 'Obsidian V-Core 6',
                'category_id' => $electric->id,
                'description' => 'The 6-string sibling of the V-Core 7. Features identical high-gain pickups, a mahogany body, and a fast neck profile tailored for players who prefer standard tuning but demand maximum heavy output.',
                'price' => 1699.00,
                'stock' => 3,
                'image' => 'product7.jpg',
                'brand' => 'Obsidian',
                'body_material' => 'Mahogany',
            ],
            [
                'name' => 'Volt Active Humbuckers',
                'category_id' => $electric->id,
                'description' => 'A set of high-output active pickups designed to deliver uncompromising heavy distortion while maintaining note clarity under extreme gain.',
                'price' => 249.00,
                'stock' => 12,
                'image' => 'product8.jpg',
                'brand' => 'Volt',
                'body_material' => 'Plastic / Copper',
            ],
            [
                'name' => 'Oblivion Drive Pedal',
                'category_id' => $electric->id,
                'description' => 'A heavy metal overdrive and distortion pedal that provides surgical EQ control and extreme saturation to tighten up your low end.',
                'price' => 189.00,
                'stock' => 15,
                'image' => 'product9.jpg',
                'brand' => 'Obsidian',
                'body_material' => 'Steel',
            ],
            [
                'name' => 'Viper Braided Cable - 20ft',
                'category_id' => $electric->id,
                'description' => 'A premium 20ft braided instrument cable with gold-plated connectors, designed for high fidelity signal transmission and road-worthy durability.',
                'price' => 59.00,
                'stock' => 25,
                'image' => 'product10.jpg',
                'brand' => 'Viper',
                'body_material' => 'Fabric / Copper',
            ],
        ];

        foreach ($products as $prod) {
            Product::updateOrCreate(
                ['slug' => Str::slug($prod['name'])],
                [
                    'name' => $prod['name'],
                    'category_id' => $prod['category_id'],
                    'description' => $prod['description'],
                    'price' => $prod['price'],
                    'stock' => $prod['stock'],
                    'image' => $prod['image'],
                    'brand' => $prod['brand'],
                    'body_material' => $prod['body_material'],
                ]
            );
        }
    }
}
