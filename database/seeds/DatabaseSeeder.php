<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    private $tables=[
        'lessons',
        'tags',
        'lesson_tag'
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->cleanDatabase();

//         $this->call(UsersTableSeeder::class);
        $this->call('LessonSeeder');
        $this->call('tagsSeeder');
        $this->call('lessons_tags_Seeder');

    }

    private function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach($this->tables as $table)
        {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
