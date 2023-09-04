@include('frontend.inc.header')

<body>
    <!--Start Preloader-->
    @include('frontend.inc.preloader')
    <!-- search-form here -->
    @include('frontend.inc.search')
    <!-- search-form here -->
    <!-- header-area start -->
    @include('frontend.inc.header-top')
    <!-- header-area end -->

    @yield('frontent_content')

    <!-- start social-newsletter-section -->
    @include('frontend.inc.newsletter')
    <!-- end social-newsletter-section -->
    <!-- .footer-area start -->
    @include('frontend.inc.footer')
    <!-- .footer-area end -->
    <!-- Modal area start -->
    @include('frontend.inc.modal')
    <!-- Modal area start -->
    <!-- jquery latest version -->
    @include('frontend.inc.script')
</body>

</html>
