<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::with('brandModels')
            ->withCount('products')
            ->orderBy('name')
            ->get();

        return view('admin.brands.index')->with([
            'brands' => $brands,
        ]);
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:55'],
        ]);

        Brand::create([
            'name' => $request->name,
        ]);

        return to_route('admin.brands.index')->with('success', __('app.createdSuccessfully', ['name' => 'Brand']));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $brand = Brand::where('id', $id)->firstOrFail();

        return view('admin.brands.edit')->with(['brand' => $brand]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:55'],
        ]);
        $brand = Brand::where('id', $id)->firstOrFail();
        $brand->update([
            'name' => $request->name,
        ]);

        return to_route('admin.brands.index')->with( 'success', 'Edited',);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $brand = Brand::where('id', $id)->firstOrFail();

        $brand->delete();

        return to_route('admin.brands.index')->with('success', 'Deleted');
    }
}
