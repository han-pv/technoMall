<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')
            ->orderBy('name')
            ->get();

        return view('admin.categories.index')->with([
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        $categories = Category::whereNull('parent_id')
            ->orderBy('name')
            ->get();
        return view('admin.categories.create')->with([
            'categories' => $categories,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'categoryId' => ['nullable', 'integer', 'min:1'],
            'name' => ['required', 'string', 'max:55'],
            'nameTm' => ['nullable', 'string', 'max:55'],
            'nameRu' => ['nullable', 'string', 'max:55'],
        ]);
        Category::create([
            'parent_id' => $request->categoryId ? $request->categoryId : null,
            'name' => $request->name,
            'name_tm' => $request->nameTm,
            'name_ru' => $request->nameRu,
        ]);

        return to_route('admin.categories.index')
            ->with('success', __('app.createdSuccessfully', ['name' => 'Category']));
    }

    public function edit(string $id)
    {
        $category = Category::where('id', $id)->firstOrFail();

        $parents = Category::whereNull('parent_id')
            ->orderBy('name')
            ->get();

        return view('admin.categories.edit')->with([
            'category' => $category,
            'parents' => $parents,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'categoryId' => ['nullable', 'integer', 'min:1'],
            'name' => ['required', 'string', 'max:55'],
            'nameTm' => ['nullable', 'string', 'max:55'],
            'nameRu' => ['nullable', 'string', 'max:55'],
        ]);
        $category = Category::where('id', $id)->firstOrFail();
        $category->update([
            'parent_id' => $request->categoryId ? $request->categoryId : null,
            'name' => $request->name,
            'name_tm' => $request->nameTm,
            'name_ru' => $request->nameRu,
        ]);

        return to_route('admin.categories.index')
            ->with('success', __('app.categoryEditedSuccessfully'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::where('id', $id)->firstOrFail();

        $brand->delete();

        return to_route('admin.categories.index')->with('success', 'Deleted');
    }
}
