@extends('bakend.user.master')
@section('user_site_title', 'User profile')

@section('content')
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row">
                @if (session()->has('update'))
                    <div class="alert alert-success">{{ session('update') }}</div>
                @endif
                <div class="col-lg-4">
                    <div class="card mb-4">
                        <div class="card-body text-center">
                            <img src="@if($all_user->profile) {{ asset('bakend.storage.user') }}/{{ $all_user->profile }} @endif
                            https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp"
                                alt="avatar" class="rounded-circle img-fluid" style="width: 150px;">
                            <h5 class="my-3">{{ $all_user->name }}</h5>
                            <p class="text-muted mb-1">{{ $all_user->designation }}</p>
                            <div class="d-flex justify-content-center mb-2">
                                <a href="{{ route('profile.edit', ['id' => $all_user->id]) }}" class="btn btn-outline-primary ms-1">Edit</a>
                            </div>
                            <div class="d-flex justify-content-center mb-2">
                                <a href="{{ route('profileImgShow.store') }}" class="btn btn-outline-primary ms-1">Change Photo</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Full Name</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $all_user->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Email</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $all_user->email }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Phone</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $all_user->phone }}</p>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-3">
                                    <p class="mb-0">Designation</p>
                                </div>
                                <div class="col-sm-9">
                                    <p class="text-muted mb-0">{{ $all_user->designation }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
