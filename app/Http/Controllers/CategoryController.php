<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $title = 'Delete Category!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        return view('admin.categories.index', [
            'categories' => Category::get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required|unique:categories,name',
        ]);

        Category::create($attributes);

        return redirect()->route('categories.index')->with('success', 'Category was created!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $attributes = $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
        ]);

        $category->update($attributes);

        return redirect()->route('categories.index')->with('success', 'Category was updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->loadCount('event');
        if ($category->event_count > 0) {
            return redirect()->route('categories.index')->with('error', 'Failed to delete category!');
        } else {
            $category->delete();
            return redirect()->route('categories.index')->with('success', 'category was deleted');
        }
    }
}
