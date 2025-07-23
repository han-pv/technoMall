<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
            [
                'name' => 'PC',
                'name_tm' => 'PK',
                'name_ru' => 'ПК',
                'subcategories' => [
                    ['name' => "Monitors", 'name_tm' => 'Monitorlar', 'name_ru' => 'Мониторы',],
                    ['name' => "Cases", 'name_tm' => 'Keyslar', 'name_ru' => 'Кейсы',],
                    ['name' => "Motherboards", 'name_tm' => 'Enelik platalar', 'name_ru' => 'Матрицы',],
                    ['name' => "WebCams", 'name_tm' => 'Web kameralar', 'name_ru' => 'Веб камеры',],
                    ['name' => "Mouses", 'name_tm' => 'Syçanjyklar', 'name_ru' => 'Мышьи',],
                    ['name' => "Keyboards", 'name_tm' => 'Klawiaturalar', 'name_ru' => 'Клавиатуры',],
                    ['name' => "Speakers", 'name_tm' => 'Kolonkalar', 'name_ru' => 'Колонки',],
                ]
            ],
            [
                'name' => 'Laptops',
                'name_tm' => 'Notebooks',
                'name_ru' => 'Ноутбуки',
                'subcategories' => [
                    ['name' => "Gamings", 'name_tm' => 'Oýun üçin kompýuterlar', 'name_ru' => 'Для игры',],
                    ['name' => "Notebooks", 'name_tm' => 'Noutbuklar', 'name_ru' => 'Ноутбуки',],
                    ['name' => "Ultrabooks", 'name_tm' => 'Ultrabuklar', 'name_ru' => 'Ултрабуки',],
                    ['name' => "Macbooks", 'name_tm' => 'Makbuklar', 'name_ru' => 'Макбуки',],
                ]
            ],
            [
                'name' => 'Phones and Tablets',
                'name_tm' => 'Telefonlar we Planşetler',
                'name_ru' => 'Телефоны и Планшеты',
                'subcategories' => [
                    ['name' => "Phones", 'name_tm' => 'Telefonlar', 'name_ru' => 'Макбуки',],
                    ['name' => "Tablets", 'name_tm' => 'Planşetlar', 'name_ru' => 'Макбуки',],
                ]
            ],
            [
                'name' => 'Smart Watches and Accessories',
                'name_tm' => 'Akylly sagatlar we Aksesuarlar',
                'name_ru' => 'Умные часы и Аксессуары',
                'subcategories' => [
                     ['name' => "Smart Watchs", 'name_tm' => 'Akylly sagatlar', 'name_ru' => 'Умные часы',],
                     ['name' => "Headphones", 'name_tm' => 'Gulaklyklar', 'name_ru' => 'Наушники',],
                     ['name' => "Microphones", 'name_tm' => 'Mikrofonlar', 'name_ru' => 'Микрофоны',],
                ]
            ],
        ];

        foreach ($objs as $obj) {
            $category= Category::create([
                'name' => $obj['name'],
                'name_tm' => $obj['name_tm'],
                'name_ru' => $obj['name_ru'],
            ]);

            foreach ($obj['subcategories'] as $subcategories) {
                Category::create([
                    'parent_id' => $category->id,
                    'name' => $subcategories['name'],
                    'name_tm' => $subcategories['name_tm'],
                    'name_ru' => $subcategories['name_ru'],
                ]);
            }
        }
    }
}
