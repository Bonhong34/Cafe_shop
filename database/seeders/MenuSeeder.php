<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\MenuCategory;
use App\Models\MenuItem;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Coffee',
                'slug' => 'coffee',
                'sort_order' => 1,
                'items' => [
                    ['name' => 'Espresso', 'description' => 'Rich double shot of espresso.', 'price' => 2.50, 'is_featured' => true],
                    ['name' => 'Cappuccino', 'description' => 'Espresso with steamed milk and foam.', 'price' => 3.75, 'is_featured' => true],
                    ['name' => 'Caffe Latte', 'description' => 'Smooth espresso with steamed milk.', 'price' => 3.95],
                    ['name' => 'Iced Americano', 'description' => 'Espresso over ice with cold water.', 'price' => 3.25],
                ],
            ],
            [
                'name' => 'Tea',
                'slug' => 'tea',
                'sort_order' => 2,
                'items' => [
                    ['name' => 'Green Tea', 'description' => 'Traditional steeped green tea.', 'price' => 2.75],
                    ['name' => 'Chai Latte', 'description' => 'Spiced tea with steamed milk.', 'price' => 3.95, 'is_featured' => true],
                    ['name' => 'English Breakfast', 'description' => 'Classic black tea blend.', 'price' => 2.75],
                ],
            ],
            [
                'name' => 'Pastries',
                'slug' => 'pastries',
                'sort_order' => 3,
                'items' => [
                    ['name' => 'Butter Croissant', 'description' => 'Flaky, buttery, baked fresh daily.', 'price' => 3.25, 'is_featured' => true],
                    ['name' => 'Blueberry Muffin', 'description' => 'Loaded with fresh blueberries.', 'price' => 3.50],
                    ['name' => 'Chocolate Chip Cookie', 'description' => 'Warm and gooey.', 'price' => 2.25],
                ],
            ],
            [
                'name' => 'Breakfast & Sandwiches',
                'slug' => 'breakfast-sandwiches',
                'sort_order' => 4,
                'items' => [
                    ['name' => 'Avocado Toast', 'description' => 'Sourdough, smashed avocado, chili flakes.', 'price' => 7.50, 'is_featured' => true],
                    ['name' => 'Turkey & Swiss Panini', 'description' => 'Grilled panini with turkey and swiss.', 'price' => 8.25],
                    ['name' => 'Egg & Cheese Bagel', 'description' => 'Toasted bagel, egg, cheddar.', 'price' => 6.50],
                ],
            ],
        ];
        foreach ($categories as $categoryData) {
            $items = $categoryData['items'];
            unset($categoryData['items']);

            $category = MenuCategory::updateOrCreate(
                ['slug' => $categoryData['slug']],
                $categoryData
            );

            foreach($items as $item) {
                MenuItem::updateOrCreate(
                    ['menu_category_id' => $category->id, 'name' => $item['name']], $item + ['menu_category_id' => $category->id]
                );
            }
            
        }
    }
}
