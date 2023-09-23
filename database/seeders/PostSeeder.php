<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB; 

// Models
use App\Models\Post;
use App\Models\Type;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        
        Post::truncate();

        // Riabilita i controlli sulle chiavi esterne
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
 

        for ($i = 0; $i < 30; $i++) {
            $title = substr(fake()->sentence(), 0, 255);
            $slug = str()->slug($title);
            $content = fake()->paragraph();

            $randomTypeId = null;
            if (fake()->boolean()) {
                $randomTypeId = Type::inRandomOrder()->first()->id;
            }

            Post::create([
                'title' => $title,
                'slug' => $slug,
                'content' => $content,
                'type_id' => $randomTypeId
            ]);
        }
    }
}
