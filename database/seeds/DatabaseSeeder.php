<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Lesson;
use App\Tag;
use App\Lesson_Tag;

class DatabaseSeeder extends Seeder
{
    /**
     * List of tables impacted by the seeder. These will be truncated first.
     * @var array
     */
    private $tables = [
        //'users',
        'lessons',
        'tags',
        'lesson_tags'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateDatabase();

        //$this->call(UsersTableSeeder::class);
        $this->call(LessonsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(Lesson_TagTableSeeder::class);
    }

    private function truncateDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($this->tables as $tableName)
        {
            DB::table($tableName)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
