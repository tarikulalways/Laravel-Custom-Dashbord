@extends('bakend.user.master')
@section('user_site_title', 'User profile')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">Profile Image</div>
                        <hr>
                        <form action="{{ route('profileImg.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="profile_img">Profile Image</label>
                                <input type="file" name="profile_img" id="" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Uploade</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
