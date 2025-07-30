<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\BrandModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $objs = [
            [
                'name' => 'Asus',
                'models' => [
                    'Monitors' => ['VP249QGR', 'TUF Gaming VG27AQ', 'ProArt Display PA278QV'],
                    'Motherboards' => ['ROG Strix B550-F', 'TUF Gaming X570-Plus'],
                    'Mouses' => ['ROG Gladius II', 'TUF Gaming M3'],
                ]
            ],
            [
                'name' => 'LG',
                'models' => [
                    'Monitors' => ['27UL500-W', '32GN650-B', '24MK600M-B'],
                    'Mouses' => ['LM100', 'LM120'],
                ]
            ],
            [
                'name' => 'Logitech',
                'models' => [
                    'Mouses' => ['MX Master 3', 'G502 HERO', 'M185'],
                    'Keyboards' => ['MX Keys', 'K380', 'G915'],
                    'Speakers' => ['Z313', 'Z625'],
                    'WebCams' => ['C920', 'Brio 4K', 'C270'],
                    'Microphones' => ['Blue Yeti Nano', 'Blue Snowball'],
                ]
            ],
            [
                'name' => 'Apple',
                'models' => [
                    'Macbooks' => ['MacBook Air M2', 'MacBook Pro 14"', 'MacBook Pro 16"'],
                    'Tablets' => ['iPad 9th Gen', 'iPad Air', 'iPad Pro'],
                    'Phones' => ['iPhone 13', 'iPhone 14', 'iPhone SE'],
                    'Smart Watchs' => ['Apple Watch Series 8', 'Apple Watch SE', 'Apple Watch Ultra'],
                ]
            ],
            [
                'name' => 'Samsung',
                'models' => [
                    'Phones' => ['Galaxy S23', 'Galaxy A54', 'Galaxy Z Flip'],
                    'Tablets' => ['Galaxy Tab S9', 'Galaxy Tab A8'],
                    'Smart Watchs' => ['Galaxy Watch 6', 'Galaxy Watch Active 2'],
                    'Monitors' => ['Smart Monitor M7', 'Odyssey G5'],
                ]
            ],
            [
                'name' => 'HP',
                'models' => [
                    'Notebooks' => ['Pavilion 15', 'ENVY x360'],
                    'Gamings' => ['Omen 16', 'Victus 15'],
                    'Ultrabooks' => ['Spectre x360', 'Elite Dragonfly'],
                ]
            ],
            [
                'name' => 'MSI',
                'models' => [
                    'Gamings' => ['Katana GF66', 'Stealth 15M'],
                    'Motherboards' => ['MAG B550 Tomahawk', 'MPG Z790 Edge'],
                    'Cases' => ['MAG Forge 100R', 'MPG GUNGNIR 110R'],
                ]
            ],
            [
                'name' => 'Razer',
                'models' => [
                    'Mouses' => ['DeathAdder V2', 'Basilisk V3'],
                    'Keyboards' => ['Huntsman Mini', 'BlackWidow V3'],
                    'Headphones' => ['Kraken V3', 'BlackShark V2'],
                ]
            ],
        ];


        foreach ($objs as $obj) {
            $brand = Brand::create([
                'name' => $obj['name'],
            ]);

            foreach ($obj['models'] as $subcategoryName => $models) {
                $subcategory = Category::where('name', $subcategoryName)->first();

                foreach ($models as $modelName) {
                    BrandModel::create([
                        'brand_id' => $brand->id,
                        'category_id' => $subcategory->id,
                        'name' => $modelName,
                    ]);
                }
            }
        }

    }
}
