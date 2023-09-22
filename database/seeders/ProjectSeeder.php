<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use App\Models\Project;

class ProjectSeeder extends Seeder
{
   
    public function run(): void
    {
        $persons = config('user');

        Project::truncate();
        foreach ($persons as $personElement) {
           $person = new Project();
           $person->name = $personElement['name'];
           $person->surname = $personElement['surname'];
           $person->age = $personElement['age'];
           $person->profession = $personElement['profession'];
           $person->nationality = $personElement['nationality'];


           $person->save();
        }
    }
}
