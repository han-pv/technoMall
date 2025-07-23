<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $categories = Category::whereNull('parent_id')
            ->with('children')
            ->get();

        $discountProducts = Product::where('is_discount', 1)
            ->orderBy('updated_at', 'desc')
            ->take(4)
            ->get();

        $topProducts = Product::orderBy('viewed', 'desc')
            ->take(8)
            ->get();

        return view('home.index')->with(
            [
                'categories' => $categories,
                'discountProducts' => $discountProducts,
                'topProducts' => $topProducts,
                'f_q' => null,
            ]
        );
    }

    public function locale($locale)
    {
        $locale = in_array($locale, ['tm', 'ru']) ? $locale : 'en';
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
