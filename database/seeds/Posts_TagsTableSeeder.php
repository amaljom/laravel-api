<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Tag;

class Posts_TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts=Post::all();
        foreach($posts as $post){
            $randomTag=Tag::inRandomOrder()->limit(2)->get();
            foreach($randomTag as $tag){
                $post->tags()->attach($tag->id);
            }
        }
    }
}