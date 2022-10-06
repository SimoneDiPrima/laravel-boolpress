<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['label'=>'BOOTSTRAP','color'=>'info'],
            ['label'=>'ES6','color'=>'light'],
            ['label'=>'JAVASCRIPT','color'=>'warning'],
            ['label'=>'VUE','color'=>'success'],
            ['label'=>'PHP','color'=>'primary'],
            ['label'=>'SQL','color'=>'secondary'],
            ['label'=>'LARAVEL','color'=>'danger'],
            ['label'=>'SASS','color'=>'pink'],
        ];

        foreach($categories as $category) {
            $new_category = new Category();
            $new_category->label = $category['label'];
            $new_category->color = $category['color'];
            $new_category->save();
        }
    }
}
