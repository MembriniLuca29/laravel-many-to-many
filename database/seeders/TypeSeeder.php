<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Schema;
class TypeSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        Type::truncate();

        Schema::enableForeignKeyConstraints();

        for ($i = 0; $i < 10; $i++) {
            $title = substr(fake()->word(), 0, 255);
            $slug = str()->slug($title);

            Type::create([
                'title' => $title,
                'slug' => $slug
            ]);
        }
    }
}