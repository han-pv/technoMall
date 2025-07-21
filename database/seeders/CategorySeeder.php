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
                    ['name' => "Monitors", 'name_tm' => 'Monitorlar'],
                    ['name' => "Case", 'name_tm' => 'Monitorlar'],
                    ['name' => "Motherboard", 'name_tm' => 'Enelik plata'],
                    ['name' => "WebCam", 'name_tm' => 'Web kamera'],
                    ['name' => "Mouse", 'name_tm' => 'Syçanjyk'],
                    ['name' => "Keyboard", 'name_tm' => 'Klawiatura'],
                    ['name' => "Speaker", 'name_tm' => 'Kolonka'],
                ]
            ],
            [
                'name' => 'Laptops',
                'name_tm' => 'Noutbuklar',
                'name_ru' => 'ноутбук',
                'subcategories' => [
                    ['name' => "Gaming", 'name_tm' => 'Oýun üçin kompýuter'],
                    ['name' => "Notebook", 'name_tm' => 'Notebook'],
                    ['name' => "Ultrabook", 'name_tm' => 'Ultrabook'],
                    ['name' => "Macbook", 'name_tm' => 'Macbook'],
                ]
            ],
            [
                'name' => 'Phones and Tablets',
                'name_tm' => 'Telefonlar we Planşetler',
                'name_ru' => 'Телефоны и планшеты',
                'subcategories' => [
                    ['name' => "Phone", 'name_tm' => 'Telefon'],
                    ['name' => "Tablet", 'name_tm' => 'Planşet'],
                ]
            ],
            [
                'name' => 'Smart Watches and Accessories',
                'name_tm' => 'Akylly sagatlar we aksesuarlar',
                'name_ru' => 'Умные часы и аксессуары',
                'subcategories' => [
                     ['name' => "Smart Watch", 'name_tm' => 'Akylly sagat'],
                     ['name' => "Headphone", 'name_tm' => 'Gulaklyk'],
                     ['name' => "Microphone", 'name_tm' => 'Mikrofon'],
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
                    'name_ru' => null,
                ]);
            }
        }
    }
}
