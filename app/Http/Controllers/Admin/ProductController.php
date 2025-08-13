<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use App\Models\BrandModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{

    public function create()
    {
        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->get();

        $brands = Brand::with('brandModels')
            ->orderBy('name')
            ->get();

        $colors = Color::orderBy('name')
            ->get();

        return view('admin.products.create')->with([
            'categories' => $categories,
            'brands' => $brands,
            'colors' => $colors,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'subCategoryId' => ['required', 'integer', 'min:1'],
            'brandModelId' => ['required', 'integer', 'min:1'],
            'colorId' => ['required', 'integer', 'min:1'],
            'title' => ['required', 'string', 'max:255'],
            'titleTm' => ['nullable', 'string', 'max:255'],
            'titleRu' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5255'],
            'descriptionTm' => ['nullable', 'string', 'max:5255'],
            'descriptionRu' => ['nullable', 'string', 'max:5255'],
            'image' => ['required', 'mimes:jpg,jpeg,png,gif', 'max:2048'], //max:2MB
            'price' => ['required', 'numeric', 'min:1'],
            'isStock' => ['nullable', 'boolean'],
            'isDiscount' => ['nullable', 'boolean'],
            'discountPrecent' => ['nullable', 'numeric', 'min:1'],
            'discountExpiresIn' => ['nullable', 'date'],
        ]);

        $brandModel = BrandModel::where('id', $request->brandModelId);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/products', 'public');
        }

        $newProduct = Product::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->subCategoryId,
            'brand_id' => $brandModel->brand_id,
            'brand_model_id' => $request->brandModelId,
            'color_id' => $request->colorId,
            'slug' => fake()->slug(),
            'title' => $request->title,
            'title_tm' => $request->titleTm,
            'title_ru' => $request->titleRu,
            'description' => $request->description,
            'description_tm' => $request->descriptionTm,
            'description_ru' => $request->descriptionRu,
            'image' => $path,
            'price' => $request->price,
            'is_stock' => $request->isStock ?: 0,
            'is_discount' => $request->isDiscount ?: 0,
            'discount_precent' => $request->isDiscount ? $request->discountPrecent : 0,
            'discount_expires_in' => $request->discountExpiresIn ?: null,
            'viewed' => 0,
            'rating' => 0,
        ]);

        $newProduct->slug = str($request->title)->slug() . "-" . $newProduct->id;

        return to_route('admin.products.index')->with('success', __('app.createdSuccessfully', ['name' => 'Product']));
    }
}
