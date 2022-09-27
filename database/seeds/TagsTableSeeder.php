<?php

use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $TagsToAdd=[
            'adventure',
            'classic',
            'passion',
            'trapani',
            'chitarreArtigianali'
        ];
        foreach($TagsToAdd as $tags){
            $newTag = new Tag();
            $newTag->name = $tags;
            $newTag->save();
        }
    }
}
