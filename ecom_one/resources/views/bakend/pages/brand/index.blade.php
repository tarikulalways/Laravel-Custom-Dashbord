@extends('bakend.master')
@section('site_title', 'All Category')
@section('content')
    <div class="col-md-11 m-auto">
        @if (session()->has('update'))
            <div class="alert alert-success">{{ session('update') }}</div>
            @elseif(session()->has('destroy'))
            <div class="alert alert-danger">{{ session('destroy') }}</div>
        @endif
        <div class="card">
            <h5 class="card-header">All Brand</h5>
            <div class="table-responsive text-nowrap">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>Brand Name</th>
                            <th>Brand Slug</th>
                            <th>Brand Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($brands as $brand)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> {{ $brand->brand_name }}
                                </td>
                                <td>{{ $brand->brad_slug }}</td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" title=""
                                            data-bs-original-title="Li{{ $brand->brand_img }}">
                                            <img src="{{ asset('storage/brand') }}/{{ $brand->brand_img }}" alt="Avatar"
                                                class="rounded-circle">
                                        </li>
                                    </ul>
                                </td>
                                <td>
                                    @if ($brand->is_active)
                                        <span class="badge bg-label-primary me-1">Active</span>
                                    @else
                                        <span class="badge bg-label-danger me-1">InActive</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                            data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                                href="{{ route('brand.edit', ['brand' => $brand->id]) }}"><i
                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                            <a class="dropdown-item" href="{{ route('brand.destory', ['brand' => $brand->id]) }}" onclick="confirm('Are You Sure Delete Brand?')"><i
                                                    class="bx bx-trash me-1"></i>
                                                Delete</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
