<?php

namespace App\Http\Controllers\Client;

use App\Models\Brand;
use App\Models\Color;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'q' => ['nullable', 'string', 'max:55'],
            'category' => ['nullable', 'integer', 'min:1'],
            'brand' => ['nullable', 'integer', 'min:1'],
            'brandModel' => ['nullable', 'integer', 'min:1'],
            'color' => ['nullable', 'array', 'min:0'],
            'color.*' => ['nullable', 'integer', 'min:1'],
            'minPrice' => ['nullable', 'numeric', 'min:1'],
            'maxPrice' => ['nullable', 'numeric', 'min:1'],
            'saleProducts' => ['nullable', 'boolean'],
            'topProducts' => ['nullable', 'boolean'],
        ]);

        $f_q = $request->has('q') ? $request->q : null;
        $f_category = $request->has('category') ? $request->category : null;
        $f_brand = $request->has('brand') ? $request->brand : null;
        $f_brand_model = $request->has('brandModel') ? $request->brandModel : null;
        $f_color = $request->has('color') ? $request->color : [];
        $f_minPrice = $request->has('minPrice') ? $request->minPrice : 0;
        $f_maxPrice = $request->has('maxPrice') ? $request->maxPrice : 0;
        $f_saleProducts = $request->has('saleProducts') ? $request->saleProducts : 0;
        $f_topProducts = $request->has('topProducts') ? $request->topProducts : 0;

        $products = Product::when(isset($f_q), function ($query) use ($f_q) {
            return $query->where(function ($query) use ($f_q) {
                $query->where('title', 'like', '%' . $f_q . '%')
                    ->orWhere('description', 'like', '%' . $f_q . '%');
            });
        })
            ->when(isset($f_category), function ($query) use ($f_category) {
                return $query->where('category_id', $f_category);
            })
            ->when(isset($f_brand), function ($query) use ($f_brand) {
                return $query->where('brand_id', $f_brand);
            })
            ->when(isset($f_brand_model), function ($query) use ($f_brand_model) {
                return $query->where('brand_model_id', $f_brand_model);
            })
            ->when(count($f_color) > 0, function ($query) use ($f_color) {
                return $query->whereIn('color_id', $f_color);
            })
            ->when($f_minPrice > 0, function ($query) use ($f_minPrice) {
                return $query->where('price', ">=", $f_minPrice);
            })
            ->when($f_maxPrice > 0, function ($query) use ($f_maxPrice) {
                return $query->where('price', "<=", $f_maxPrice);
            })
            ->when($f_saleProducts  == 1, function ($query) {
                return $query->where('is_discount', 1);
            })
            ->when($f_topProducts  == 1, function ($query) {
                return $query->orderBy('viewed', 'desc');
            })
            ->inRandomOrder()
            ->paginate(28)
            ->withQueryString();

        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->get();

        $colors = Color::orderBy('name')
            ->get();

        $brands = Brand::with('brandModels')
            ->orderBy('name')
            ->get();

        return view('products.index')->with(
            [
                'products' => $products,
                'categories' => $categories,
                'brands' => $brands,
                'colors' => $colors,
                'f_q' => $f_q,
                'f_category' => $f_category,
                'f_brand' => $f_brand,
                'f_brand_model' => $f_brand_model,
                'f_color' => $f_color,
                'f_minPrice' => $f_minPrice,
                'f_maxPrice' => $f_maxPrice,
                'f_saleProducts' => $f_saleProducts,
                'f_topProducts' => $f_topProducts,
            ]
        );
    }
}
