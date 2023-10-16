<?php

namespace Database\Seeders;

use App\Models\Surrounding;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurroundingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void

    {
        $data = [
            ['name' => 'Tên 1', 'icon' => 'Icon 1'],
            ['name' => 'Tên 2', 'icon' => 'Icon 2'],
            ['name' => 'Tên 3', 'icon' => 'Icon 3'],
            // Thêm các cặp name và icon khác tùy ý
        ];

        // Lặp qua mảng và tạo các bản ghi
        foreach ($data as $item) {
            Surrounding::create([
                'name' => $item['name'],
                'icon' => $item['icon'],
            ]);
        }
    }
}
