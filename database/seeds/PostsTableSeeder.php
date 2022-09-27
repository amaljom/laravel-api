<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;
use App\Models\Category;
use App\User;
class PostsTableSeeder extends Seeder

{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $Users = User::all();
        $categories = Category::all();
        for ($i=0; $i < 5 ; $i++) { 
            $newPost= new Post();
            $newPost->user_id = $faker->randomElement($Users)->id;
            $newPost->category_id = $faker->randomElement($categories)->id;
            $newPost->author = $faker->realText(30);
            $newPost->title = $faker->realText();
            $newPost->post_content = $faker->realText();
            $newPost->post_image = $faker->imageUrl(400, 400);
            $newPost->post_date = $faker->dateTime();
            $newPost->save();
        }
    }
}
