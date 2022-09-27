<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Categories=[
            'action',
            'html',
            'coding',
            'bollywood'
        ];

        foreach($Categories as $category){
            $categoria = new Category();
            $categoria->name = $category;
            $categoria->save();
        }
    }
}
