@extends('bakend.master')
@section('site_title', 'Edit Category')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                @if (session()->has('store'))
                    <div class="alert alert-success">{{ session('store') }}</div>
                @endif
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Update Category</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.update', ['category' => $category->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Category Name</label>
                                <input type="text" class="form-control" id="basic-default-fullname" name="category"
                                    value="{{ $category->name }}">
                            </div>
                            <div class="mb-3">
                                <label for="cat_img">Category Image</label>
                                <input type="file" name="cat_img" id="" class="form-control">

                                <input type="hidden" name="old_img" value="{{ $category->cat_img }}">
                            </div>
                            <div class="form-check mb-3">
                                <input @if($category->is_active) checked @endif class="form-check-input" type="checkbox" id="flexCheckDefault"
                                    name="is_active">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Active/InActive
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
