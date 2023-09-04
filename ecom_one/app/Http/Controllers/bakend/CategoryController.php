<?php

namespace App\Http\Controllers\bakend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::select(['id', 'name', 'slug', 'cat_img', 'is_active', 'updated_at'])->latest('id')->withCount('subCategory_rtl')->get();

        return view('bakend.pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bakend.pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)
    {
        $store = Category::create([
            'name' => $request->category,
            'slug' => Str::slug($request->category),
            'is_active' => filled($request->is_active)
        ]);

        if ($request->hasFile('cat_img')) {
            $file = $request->file('cat_img');
            $file_name = $file->getClientOriginalName();
            $file_store = $file->storeAs('/category', $file_name,'public');

            $store->update([
                'cat_img' => $file_name
            ]);
        }

        session()->flash('store', 'Category Add Successfull!');
        return redirect()->route('category.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('bakend.pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, Category $category)
    {
        $old_img_location = "/public/storage/category/$request->old_img";

        $category->update([
            'name' => $request->category,
            'slug' => Str::slug( $request->category),
            'is_active' => filled($request->is_active)
        ]);

        if($request->hasFile('cat_img')){
            $file = $request->file('cat_img');
            $file_name = $file->getClientOriginalName();
            if($file_name != $old_img_location){
                unlink(base_path($old_img_location));
            }
            $store_file = $file->storeAs('/category', $file_name, 'public');

            $category->update([
                'cat_img' => $file_name
            ]);
        }

        session()->flash('update', 'Category Update Successfull!');
        return redirect()->route('category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $img = $category['cat_img'];
        $img_location = "public/storage/category/$img";
        $category->delete();
        unlink(base_path($img_location));
        session()->flash('destroy', 'Category Delete Successfull!');
        return redirect()->route('category.index');
    }
}
