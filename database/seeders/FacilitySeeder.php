<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    // \App\Models\Facility::factory(1)->create();
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
            Facility::create([
                'name' => $item['name'],
                'icon' => $item['icon'],
                'description' => fake()->text(10), // Sử dụng Faker cho description hoặc cung cấp giá trị theo ý muốn
            ]);
        }
    }
}
