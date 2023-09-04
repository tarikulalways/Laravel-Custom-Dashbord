<?php

namespace App\Http\Controllers\bakend;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubcategoryStoreRequest;
use App\Http\Requests\SubcategoryUpdateRequest;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::select(['id', 'sub_category', 'sub_cat_slug', 'category_id', 'sub_cat_img', 'is_active', 'updated_at'])->latest()->with('category_rtl')->get();
        return view('bakend.pages.subcategory.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('is_active', 1)->latest('id')->select(['id', 'name'])->get();
        return view('bakend.pages.subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryStoreRequest $request)
    {
        $store = SubCategory::create([
            'sub_category' => $request->sub_category,
            'sub_cat_slug' => Str::slug($request->sub_category),
            'category_id' => $request->category,
            'is_active' => filled($request->is_active)
        ]);

        if($request->hasFile('Subcat_img')){
            $file = $request->file('Subcat_img');
            $file_name = $file->getClientOriginalName();

            $upload = $file->storeAs('/subcategory', $file_name, 'public');

            $store->update([
                'sub_cat_img' => $file_name
            ]);
        }
        session()->flash('store', 'Sub Category Added Successfull!');
        return redirect()->route('subCategory.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $categories = Category::select(['id', 'name'])->get();
        return view('bakend.pages.subcategory.edit', compact('subCategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategoryUpdateRequest $request, SubCategory $subCategory)
    {
        $old_img_location = "public/storage/subcategory/$request->old_img";

        $subCategory->update([
            'sub_category' => $request->sub_category,
            'sub_cat_slug' => Str::slug($request->sub_category),
            'category_id' => $request->category,
            'is_active' => filled($request->is_active)
        ]);

        if($request->hasFile('Subcat_img')){
            $file = $request->file('Subcat_img');
            $file_name = $file->getClientOriginalName();

            if($file_name != $old_img_location){
                unlink(base_path($old_img_location));
            }
            $img_upload = $file->storeAs('/subcategory', $file_name, 'public');

            $subCategory->update([
                'sub_cat_img' => $file_name
            ]);
        }
        session()->flash('update', 'Sub Category Update Successfull!');
        return redirect()->route('subCategory.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $img = $subCategory['sub_cat_img'];
        $img_location = "public/storage/subcategory/$img";

        $subCategory->delete();
        unlink(base_path($img_location));

        session()->flash('destroy', 'Sub Category Delete Successfull!');
        return redirect()->route('subCategory.index');
    }
}
