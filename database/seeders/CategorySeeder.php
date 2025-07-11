<?php

namespace Database\Seeders;

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
                'subcategories' => [
                    'Monitor',
                    'Case',
                    'Motherboard',
                    'WebCam',
                    'Mouse',
                    'Keyboard',
                    'Speaker',
                ]
            ],
            [
                'name' => 'Laptop',
                'subcategories' => [
                    'Gaming',
                    'Notebook',
                    'Ultrabook',
                    'Macbook',
                ]
            ],
            [
                'name' => 'Phone and Tablet',
                'subcategories' => [
                    'Phone',
                    'Tablet',
                ]
            ],
            [
                'name' => 'Smart Watch and Accessories',
                'subcategories' => [
                    'Smart Watch',
                    'Headphone',
                    'Microphone',
                ]
            ],
        ];
    }
}
