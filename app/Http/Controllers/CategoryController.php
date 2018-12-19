<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategory;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function store(StoreCategory $request) {
        $this->categoryService->make($request->all());

        return back();
    }

    public function edit() {

    }

    public function update(StoreCategory $request, $category_id) {
        $this->categoryService->update($request->all(), $category_id);

        return back();
    }
}
