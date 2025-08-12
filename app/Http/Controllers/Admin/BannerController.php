<?php

namespace App\Http\Controllers\Admin;

use App\Models\Banner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {

        $banners = Banner::get();

        return view('admin.banners.index')
        ->with('banners', $banners);
    }

    public function create()
    {
        return view('admin.banners.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'image' => ['required', 'mimes:jpg,jpeg,png,gif', 'max:2048'] //max:2MB
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images/banners', 'public');
        }

        Banner::create([
            'image_path' => $path,
        ]);

        return to_route('admin.banners.index')
            ->with('success', __('app.createdSuccessfully', ['name' => 'Banner']));

    }

    public function edit(string $id)
    {
        $banner = Banner::where('id', $id)->firstOrFail();

        return view('admin.banners.edit')
            ->with(['banner' => $banner]);
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'image' => ['required', 'mimes:jpg,jpeg,png,gif', 'max:2048'] //max:2MB
        ]);
        
        $banner = Banner::where('id', $id)->firstOrFail();

        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($banner->image_path); // onkuni pozyar
            $newPath = $request->file('image')->store('images/banners', 'public');
        }

        $banner->image_path = $newPath;
        $banner->update();

        return to_route('admin.banners.index')
            ->with('success', __('app.editedSuccessfully', ['name' => 'Banner']));
    }

    public function destroy(string $id)
    {
        $banner = Banner::where('id', $id)->firstOrFail();

        if ($banner->image_path) {
            Storage::disk('public')->delete($banner->image_path); // pozyar
        }

        $banner->delete();

        return to_route('admin.banners.index')
        ->with('succes', __('app.deletedSuccessfully', ['name' => 'Banner']));

    }
}
