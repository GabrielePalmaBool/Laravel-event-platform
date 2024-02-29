<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;
use App\Models\Tag;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event :: factory() 
                -> count(25) 
                -> create() 
                -> each(function($event) {

                $tags = Tag :: inRandomOrder() -> limit(3) -> get();
                $event -> tags() -> attach($tags);
                $event -> save();

        });
    }
}
