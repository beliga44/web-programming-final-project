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

    public function edit($category_id) {
        $category = $this->categoryService->getCategoryById($category_id);

        return view('category.edit', ['category' => $category]);
    }

    public function update(StoreCategory $request, $category_id) {
        $this->categoryService->update($request->all(), $category_id);

        if ($request['is_master'] == true) {
            return redirect()->route('category.master');
        }

        return back();
    }

    public function destroy($category_id) {
        $this->categoryService->destroy($category_id);

        return back();
    }

    public function showMaster() {
        $categories = $this->categoryService->all();

        return view('category.master', ['categories' => $categories]);
    }
}
