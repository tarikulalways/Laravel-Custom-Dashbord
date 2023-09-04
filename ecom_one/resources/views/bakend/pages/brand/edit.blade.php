@extends('bakend.master')
@section('site_title', 'Edit Brand')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Edit Brand</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('brand.update', ['brand' => $brand->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="basic-default-fullname">Brand Name</label>
                                <input type="text" class="form-control" id="basic-default-fullname" name="brand"
                                    value="{{ $brand->brand_name }}">
                                    @error('brand')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cat_img">Brand Logo</label>
                                <input type="file" name="brand_img" id="" class="form-control">
                                <input type="hidden" name="old_img" value="{{ $brand->brand_img }}">
                                
                                @error('brand_img')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-check mb-3">
                                <input @if($brand->is_active) checked @endif class="form-check-input" type="checkbox" id="flexCheckDefault"
                                    name="is_active">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Active/InActive
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary">Update Brand</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
