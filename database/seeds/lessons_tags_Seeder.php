<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\lesson;
use App\Tag;

class lessons_tags_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        $lessonsIds=lesson::lists('id');
        $tagsIds=Tag::lists('id');
        
        foreach(range(1,30) as $index)
        {
            DB::table('lesson_tag')->insert([
                'lesson_id'=>$faker->randomElement($lessonsIds->toArray()),
                'tag_id'=>$faker->randomElement($tagsIds->toArray())
            ]);
        }
    }
}
