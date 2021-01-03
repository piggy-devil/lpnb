<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();

        $usersQuantity = 20;
        $categoriesQuantity = 30;
        $productsQuantity = 100;
        $transactionsQuantity = 100;

        User::factory()->count($usersQuantity)->create();
        Category::factory()->count($categoriesQuantity)->create();
        Product::factory()->count($productsQuantity)->create();

        Product::factory()->count($categoriesQuantity)->create()->each(
        	function ($product) {
        		$categories = Category::all()->random(mt_rand(1, 5))->pluck('id');

        		$product->categories()->attach($categories);
        	});

        Transaction::factory()->count($transactionsQuantity)->create();
    }
}
