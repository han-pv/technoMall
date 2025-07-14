<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $objs = [
           ['name' => 'white', 'name_tm' => 'ak', 'name_ru' => 'белый'],
           ['name' => 'gray', 'name_tm' => 'çal', 'name_ru' => 'серый'],
           ['name' => 'black', 'name_tm' => 'gara', 'name_ru' => 'черный'],
           ['name' => 'silver', 'name_tm' => 'kümüşsow', 'name_ru' => 'серебристый'],
        ];

        foreach($objs as $obj) {
            Color::create([
                'name' => $obj['name'],
                'name_tm' => $obj['name_tm'],
                'name_ru' => $obj['name_ru'],
            ]);
        }
    }
}
