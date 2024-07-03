<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(5)->create();
        Product::factory(20)->create();
       
        // php artisan migrate
        // php artisan db:seed class=MovieSeeder

        Tag::create(['value' => 'porcelana']);
        Tag::create(['value' => 'melamina']);
        Tag::create(['value' => 'vidrio']);
        Tag::create(['value' => 'deco']);
        Tag::create(['value' => 'nordico']);
    }
}
