<?php
/**
 * Created by PhpStorm.
 * User: IG17-1
 * Date: 12/12/2018
 * Time: 13:08
 */

namespace App\Services;


use App\Category;

class CategoryService
{
    public function all() {
        return Category::all();
    }

}
