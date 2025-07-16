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
                    'Motherboard' => ['ROG Strix B550-F', 'TUF Gaming X570-Plus'],
                    'Mouse' => ['ROG Gladius II', 'TUF Gaming M3'],
                ]
            ],
            [
                'name' => 'LG',
                'models' => [
                    'Monitors' => ['27UL500-W', '32GN650-B', '24MK600M-B'],
                    'Mouse' => ['LM100', 'LM120'],
                ]
            ],
            [
                'name' => 'Logitech',
                'models' => [
                    'Mouse' => ['MX Master 3', 'G502 HERO', 'M185'],
                    'Keyboard' => ['MX Keys', 'K380', 'G915'],
                    'Speaker' => ['Z313', 'Z625'],
                    'WebCam' => ['C920', 'Brio 4K', 'C270'],
                    'Microphone' => ['Blue Yeti Nano', 'Blue Snowball'],
                ]
            ],
            [
                'name' => 'Apple',
                'models' => [
                    'Macbook' => ['MacBook Air M2', 'MacBook Pro 14"', 'MacBook Pro 16"'],
                    'Tablet' => ['iPad 9th Gen', 'iPad Air', 'iPad Pro'],
                    'Phone' => ['iPhone 13', 'iPhone 14', 'iPhone SE'],
                    'Smart Watch' => ['Apple Watch Series 8', 'Apple Watch SE', 'Apple Watch Ultra'],
                ]
            ],
            [
                'name' => 'Samsung',
                'models' => [
                    'Phone' => ['Galaxy S23', 'Galaxy A54', 'Galaxy Z Flip'],
                    'Tablet' => ['Galaxy Tab S9', 'Galaxy Tab A8'],
                    'Smart Watch' => ['Galaxy Watch 6', 'Galaxy Watch Active 2'],
                    'Monitors' => ['Smart Monitor M7', 'Odyssey G5'],
                ]
            ],
            [
                'name' => 'HP',
                'models' => [
                    'Notebook' => ['Pavilion 15', 'ENVY x360'],
                    'Gaming' => ['Omen 16', 'Victus 15'],
                    'Ultrabook' => ['Spectre x360', 'Elite Dragonfly'],
                ]
            ],
            [
                'name' => 'MSI',
                'models' => [
                    'Gaming' => ['Katana GF66', 'Stealth 15M'],
                    'Motherboard' => ['MAG B550 Tomahawk', 'MPG Z790 Edge'],
                    'Case' => ['MAG Forge 100R', 'MPG GUNGNIR 110R'],
                ]
            ],
            [
                'name' => 'Razer',
                'models' => [
                    'Mouse' => ['DeathAdder V2', 'Basilisk V3'],
                    'Keyboard' => ['Huntsman Mini', 'BlackWidow V3'],
                    'Headphone' => ['Kraken V3', 'BlackShark V2'],
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
