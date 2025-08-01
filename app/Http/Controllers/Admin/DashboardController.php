<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use function PHPUnit\Framework\returnArgument;

class DashboardController extends Controller
{
    public function index()
    {

        $brands = Brand::with('brandModels')
            ->withCount('products')
            ->orderBy('name')
            ->get();

        return view('admin.dashboard.index')->with([
            'brands' => $brands,
        ]);
    }
}
