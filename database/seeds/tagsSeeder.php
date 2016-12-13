<?php

use Illuminate\Database\Seeder;

class tagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory('App\Tag',10)->create();
    }
}
