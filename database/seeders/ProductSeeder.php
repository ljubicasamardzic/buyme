<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'category_id' => 1,
                'name' => 'Luxury watch',
                'price' => 60000,
                'path' => '/watches/luxury-watch.jpg'
            ],
            [
                'category_id' => 1,
                'name' => 'Leather strap watch',
                'price' => 45900,
                'path' => '/watches/leather-watch.webp'
            ],
            [
                'category_id' => 1,
                'name' => 'Moonwatch',
                'price' => 90000,
                'path' => '/watches/moonwatch.png'
            ],
            [
                'category_id' => 2,
                'name' => 'Vilya',
                'price' => 10000,
                'path' => '/rings/ring.png'
            ],
            [
                'category_id' => 2,
                'name' => 'Nenya',
                'price' => 40000,
                'path' => '/rings/diamond-ring.jpg'
            ],
            [
                'category_id' => 2,
                'name' => 'Sindya',
                'price' => 50000,
                'path' => '/rings/leaf-ring.jpg'
            ],
            [
                'category_id' => 2,
                'name' => 'Taurya',
                'price' => 65000,
                'path' => '/rings/gold.webp'
            ],
            [
                'category_id' => 2,
                'name' => 'Nenya',
                'price' => 40000,
                'path' => '/rings/rose-ring.jpg'
            ],
            [
                'category_id' => 3,
                'name' => 'Golden passion',
                'price' => 40000,
                'path' => '/earrings/gold.jpg'
            ],
            [
                'category_id' => 3,
                'name' => 'Loops',
                'price' => 40000,
                'path' => '/earrings/loops.avif'
            ],
            [
                'category_id' => 3,
                'name' => 'Rose earrings',
                'price' => 40000,
                'path' => '/earrings/rose.jpg'
            ],
            [
                'category_id' => 3,
                'name' => 'Diamond earrings',
                'price' => 40000,
                'path' => '/earrings/diamong.avif'
            ],
            [
                'category_id' => 3,
                'name' => 'Bvlgari gold',
                'price' => 40000,
                'path' => '/earrings/bulgari.jpg'
            ],
            [
                'category_id' => 4,
                'name' => 'Layered necklace',
                'price' => 56000,
                'path' => '/necklaces/layered.jpg'
            ],
            [
                'category_id' => 4,
                'name' => 'Unity',
                'price' => 32000,
                'path' => '/necklaces/unity.png'
            ],
            [
                'category_id' => 4,
                'name' => 'Coco',
                'price' => 40000,
                'path' => '/necklaces/coco.webp'
            ],
            [
                'category_id' => 4,
                'name' => 'Diamond locket',
                'price' => 20000,
                'path' => '/necklaces/locket.jpg'
            ],
            [
                'category_id' => 4,
                'name' => 'Butterfly necklace',
                'price' => 40000,
                'path' => '/necklaces/butterfly.jpg'
            ],
            [
                'category_id' => 4,
                'name' => 'Rose gold necklace',
                'price' => 8000,
                'path' => '/necklaces/rose.webp'
            ]
        ];

        foreach ($products as $product) {
            Product::create([
                'name' => $product['name'],
                'path' => $product['path'],
                'price' => $product['price'],
                'category_id' => $product['category_id']
            ]);
        }
    }
}
