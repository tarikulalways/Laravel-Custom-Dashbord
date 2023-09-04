@extends('frontend.master')
@section('frontent_content')

<!-- slider-area start -->
@include('frontend.widget.slider')
<!-- slider-area end -->
<!-- featured-area start -->
@include('frontend.widget.category')
<!-- featured-area end -->
<!-- start count-down-section -->
@include('frontend.widget.counter')
<!-- end count-down-section -->
<!-- product-area start -->
@include('frontend.widget.best-selling')
<!-- product-area end -->
<!-- product-area start -->
@include('frontend.widget.latest-pdt')
<!-- product-area end -->
<!-- testmonial-area start -->
@include('frontend.widget.testimonial')
<!-- testmonial-area end -->

@endsection
