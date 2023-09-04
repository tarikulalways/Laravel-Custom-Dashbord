@extends('bakend.master')
@section('site_title', 'Add Brand')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                @if (session()->has('store'))
                    <div class="alert alert-success">{{ session('store') }}</div>
                @endif
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Brand</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('brand.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Brand Name</label>
                                <input type="text" class="form-control" id="basic-default-fullname" name="brand"
                                    placeholder="Brand Name">
                                    @error('brand')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cat_img">Brand Logo</label>
                                <input type="file" name="brand_img" id="" class="form-control">
                                 @error('brand_img')
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
                            <button type="submit" class="btn btn-primary">Add Brand</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
