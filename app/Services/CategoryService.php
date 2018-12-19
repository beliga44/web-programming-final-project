<?php
/**
 * Created by PhpStorm.
 * User: IG17-1
 * Date: 12/12/2018
 * Time: 13:08
 */

namespace App\Services;


use App\Category;
use App\Thread;

class CategoryService
{
    public function all() {
        return Category::all();
    }

    public function getCategoryById($category_id) {
        return Category::find($category_id);
    }

    public function make(array $data) {
        return Category::create($data);
    }

    public function update(array $data, $category_id) {
        return Category::find($category_id)->update($data);
    }

    public function destroy($category_id) {
        Category::destroy($category_id);
    }
}
