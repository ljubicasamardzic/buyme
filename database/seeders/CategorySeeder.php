<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'id' => 1,
                'name' => 'Watches',
                'path' => '/categories/watch.jpg'
            ],
            [
                'id' => 2,
                'name' => 'Rings',
                'path' => '/categories/rings.jpg'
            ],
            [
                'id' => 3,
                'name' => 'Earrings',
                'path' => '/categories/earrings.jpg'
            ],
            [
                'id' => 4,
                'name' => 'Necklaces',
                'path' => '/categories/necklace.jpg'
            ]
        ];

        foreach ($categories as $category) {
            Category::create([
                'id' => $category['id'],
                'name' => $category['name'],
                'path' => $category['path']
            ]);
        }
    }
}
