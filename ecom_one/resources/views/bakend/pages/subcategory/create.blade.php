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
                        <h5 class="mb-0">Sub Category</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('subCartegory.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Sub Category Name</label>
                                <input type="text" class="form-control" id="basic-default-fullname" name="sub_category"
                                    placeholder="Sub Category Name">
                                @error('sub_category')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cat_img form-lable">Sub Category Image</label>
                                <input type="file" name="Subcat_img" id="" class="form-control">
                                @error('Subcat_img')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="category">Select A Category</label>

                                <select class="form-select" name="category">
                                    <option value="">Select a Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-check mb-3">
                                <input checked class="form-check-input" type="checkbox" id="flexCheckDefault"
                                    name="is_active">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Active/InActive
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Add Sub Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
