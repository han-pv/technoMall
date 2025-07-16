<?php

namespace Database\Seeders;

use App\Models\BrandModel;
use App\Models\Color;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i <= 500; $i++) {
            $user = User::where('is_admin', 0)->inRandomOrder()->first();
            $brandModel = BrandModel::with('brand', 'category')->inRandomOrder()->first();
            $color = Color::inRandomOrder()->first();
            $isDiscount = fake()->boolean(30);

            $product = Product::create([
                'user_id' => $user->id,
                'category_id' => $brandModel->category_id,
                'brand_id' => $brandModel->brand_id,
                'brand_model_id' => $brandModel->id,
                'color_id' => $color->id,
                'slug' => fake()->slug(),
                'title' => $brandModel->brand->name . " " . $brandModel->name . " " . $color->name,
                'title_tm' => $brandModel->brand->name . " " . $brandModel->name . " " . $color->name_tm,
                'title_ru' => $brandModel->brand->name . " " . $brandModel->name . " " . $color->name_ru,
                'description' => fake()->paragraph(rand(2, 5)),
                'price' => fake()->numberBetween(1000, 50000),
                'is_stock' => fake()->boolean(80),
                'is_discount' => $isDiscount,
                'discount_precent' => $isDiscount ? fake()->numberBetween(3, 99) : 0,
                'discount_expires_in' => now()->addWeeks(rand(2, 3)),
                'viewed' => fake()->numberBetween(500, 10000),
                'rating' => fake()->numberBetween(1, 5),
            ]);

            $product->slug = str($product->title)->slug() . "-" . $product->id;
            $product->update();
        }
    }
}
