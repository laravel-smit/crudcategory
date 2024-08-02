<?php

namespace Laravelsmit\CrudCategory\Http\Controllers;

use Laravelsmit\CrudCategory\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller {

    public function index() {
        $categories = Category::with('children')->get();
        return view('categorypackage::index', compact('categories'));
    }

    public function create() {
        return view('categorypackage::create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories',
            'status' => 'required|in:active,inactive',
        ]);

        Category::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category) {
        return view('categorypackage::edit', compact('category'));
    }

    public function update(Request $request, Category $category) {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
            'status' => 'required|in:active,inactive',
        ]);

        $category->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy(Category $category) {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

}
