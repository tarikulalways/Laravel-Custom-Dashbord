@extends('bakend.master')
@section('site_title', 'Add Sub Category')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                @if (session()->has('store'))
                    <div class="alert alert-success">{{ session('store') }}</div>
                @endif
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Sub Category</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('subCategory.update', ['subCategory' => $subCategory->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Sub Category Name</label>
                                <input type="text" class="form-control" id="basic-default-fullname" name="sub_category"
                                    value="{{ $subCategory->sub_category }}">
                                @error('sub_category')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cat_img form-lable">Sub Category Image</label>
                                <input type="file" name="Subcat_img" id="" class="form-control">
                                <input type="hidden" name="old_img" value="{{ $subCategory->sub_cat_img }}">
                                @error('Subcat_img')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category">Select A Category</label>

                                <select class="form-select" name="category">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-check mb-3">
                                <input @if($subCategory->is_active) checked @endif class="form-check-input" type="checkbox" id="flexCheckDefault"
                                    name="is_active">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Active/InActive
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Sub Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
