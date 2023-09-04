@extends('bakend.master')
@section('site_title', 'Add Category')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
            @if (session()->has('store'))
                <div class="alert alert-success">{{ session('store') }}</div>
            @endif
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Category</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Category Name</label>
                                <input type="text" class="form-control" id="basic-default-fullname" name="category" placeholder="Category Name">
                                @error('category')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cat_img">Category Image</label>
                                <input type="file" name="cat_img" id="" class="form-control">
                                @error('cat_img')
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
                            <button type="submit" class="btn btn-primary">Add Category</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
