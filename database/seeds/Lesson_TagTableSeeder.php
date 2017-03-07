<?php

use Illuminate\Database\Seeder;
use App\Lesson;
use App\Tag;

class Lesson_TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\LessonTag::class, 20)->create();
    }
}
