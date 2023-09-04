<?php

namespace App\Http\Controllers\bakend;

use App\Models\Brand;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BrandStoreRequest;
use App\Http\Requests\BrandUpdateRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::select(['id', 'brand_name', 'brad_slug','brand_img', 'is_active', 'updated_at'])->latest('id')->get();
        return view('bakend.pages.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bakend.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandStoreRequest $request)
    {
        $store = Brand::create([
            'brand_name' => $request->brand,
            'brad_slug' => Str::slug($request->brand),
            'is_active' => filled($request->is_active)
        ]);

        if($request->hasFile('brand_img')){
            $file = $request->file('brand_img');
            $file_name = $file->getClientOriginalName();

            $store_file = $file->storeAs('/brand', $file_name, 'public');

            $store->update([
                'brand_img' => $file_name
            ]);

        }

        session()->flash('store', 'Brand Added Successfull!');
        return redirect()->route('brand.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('bakend.pages.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(BrandUpdateRequest $request, Brand $brand)
    {
        $old_img_location = "/public/storage/brand/$request->old_img";

        $brand->update([
            'brand_name' => $request->brand,
            'brad_slug' => Str::slug($request->brand),
            'is_active' => filled($request->is_active)
        ]);

        if($request->hasFile('brand_img')){
            $file = $request->file('brand_img');
            $file_name = $file->getClientOriginalName();

            if($file_name != $old_img_location){
                unlink(base_path($old_img_location));
            }
            $file_store = $file->storeAs('/brand', $file_name, 'public');

            $brand->update([
                'brand_img' => $file_name
            ]);
        }
        session()->flash('update', 'Brand Update Successfull!');
        return redirect()->route('brand.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $img = $brand['brand_img'];
        $img_location = "public/storage/brand/$img";

        $brand->delete();
        unlink(base_path($img_location));
        session()->flash('destroy', 'Brand Delete Successfull!');
        return redirect()->route('brand.index');
    }
}
