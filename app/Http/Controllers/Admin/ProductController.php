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
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with(['user', 'category', 'brand', 'brandModel', 'color'])
            ->orderBy('created_at', 'desc')
            ->paginate(28)
            ->withQueryString();

        return view('admin.products.index')->with([
            'products' => $products,
        ]);
    }

    public function show(string $id)
    {
        $product = Product::with(['category', 'brand', 'brandModel', 'color'])
            ->where('id', $id)
            ->firstOrFail();

        return view('admin.products.show')->with([
            'product' => $product,
        ]);
    }

    public function create()
    {
        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->orderBy('name')
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
            'categoryId' => ['required', 'integer', 'min:1'],
            'brandModelId' => ['required', 'integer', 'min:1'],
            'colorId' => ['required', 'integer', 'min:1'],
            'title' => ['required', 'string', 'max:255'],
            'titleTm' => ['nullable', 'string', 'max:255'],
            'titleRu' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5255'],
            'descriptionTm' => ['nullable', 'string', 'max:5255'],
            'descriptionRu' => ['nullable', 'string', 'max:5255'],
            'image' => ['required', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'price' => ['required', 'numeric', 'min:1'],
            'isStock' => ['nullable', 'boolean'],
            'isDiscount' => ['nullable', 'boolean'],
            'discountPrecent' => ['required_if:isDiscount,1', 'nullable', 'numeric', 'min:1'],
            'discountExpiresIn' => ['required_if:isDiscount,1', 'nullable', 'date'],
        ]);

        $brandModel = BrandModel::where('id', $request->brandModelId)->firstOrFail();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/products', 'public');
        }

        $newProduct = Product::create([
            'user_id' => auth()->user()->id,
            'category_id' => $request->categoryId,
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
        $newProduct->update();

        return to_route('admin.products.index')
            ->with('success', __('app.createdSuccessfully', ['name' => 'Product']));
    }

    public function edit(string $id)
    {
        $product = Product::where('id', $id)->firstOrFail();
        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->orderBy('name')
            ->get();
        $brands = Brand::with('brandModels')
            ->orderBy('name')
            ->get();
        $colors = Color::orderBy('name')
            ->get();

        return view('admin.products.edit')->with([
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands,
            'colors' => $colors,
        ]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'categoryId' => ['required', 'integer', 'min:1'],
            'brandModelId' => ['required', 'integer', 'min:1'],
            'colorId' => ['required', 'integer', 'min:1'],
            'title' => ['required', 'string', 'max:255'],
            'titleTm' => ['nullable', 'string', 'max:255'],
            'titleRu' => ['nullable', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:5255'],
            'descriptionTm' => ['nullable', 'string', 'max:5255'],
            'descriptionRu' => ['nullable', 'string', 'max:5255'],
            'image' => ['nullable', 'mimes:jpg,jpeg,png,gif', 'max:2048'],
            'price' => ['required', 'numeric', 'min:1'],
            'isStock' => ['nullable', 'boolean'],
            'isDiscount' => ['nullable', 'boolean'],
            'discountPrecent' => ['required_if:isDiscount,1', 'nullable', 'numeric', 'min:1'],
            'discountExpiresIn' => ['required_if:isDiscount,1', 'nullable', 'date'],
        ]);

        $product = Product::where('id', $id)->firstOrFail();
        $brandModel = BrandModel::where('id', $request->brandModelId)->firstOrFail();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $path = $request->file('image')->store('images/products', 'public');
        } else {
            $path = $product->image;
        }

        $product->update([
            'category_id' => $request->categoryId,
            'brand_id' => $brandModel->brand_id,
            'brand_model_id' => $request->brandModelId,
            'color_id' => $request->colorId,
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
        ]);

        $product->slug = str($request->title)->slug() . "-" . $product->id;
        $product->update();

        return to_route('admin.products.index')
            ->with('success', __('app.editedSuccessfully', ['name' => 'Product']));
    }

    public function destroy(string $id)
    {
        $product = Product::where('id', $id)->firstOrFail();

        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();

        return to_route('admin.products.index')
            ->with('success', __('app.deletedSuccessfully', ['name' => 'Product']));
    }
}