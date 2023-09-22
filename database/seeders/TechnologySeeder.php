<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Technology;

// Helpers
use Illuminate\Support\Facades\Schema;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Technology::truncate();
        });

        $technologys = [
            'Bello',
            'Figo',
            'Gu',
            'Interessante',
            'Geniale',
            'Brutto'
        ];

        foreach ($technologys as $title) {
            $slug = str()->slug($title);

            Technology::create([
                'title' => $title,
                'slug' => $slug
            ]);
        }
    }
}