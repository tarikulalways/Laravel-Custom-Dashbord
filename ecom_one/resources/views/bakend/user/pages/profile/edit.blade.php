@extends('bakend.user.master')
@section('user_site_title', 'Edit profile')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 my-4 m-auto">
                <form action="{{ route('profile.update',['id' => $id]) }}" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            Profile Edit
                            <hr>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="" class="form-control">
                                @error('name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="" class="form-control">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Change Password</label>
                                <input type="password" name="password" placeholder="New Password" class="form-control">
                                @error('password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
