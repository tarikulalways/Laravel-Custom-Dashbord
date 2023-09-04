@include('bakend.inc.header')

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Layout container -->
            <div class="layout-page">
                @include('bakend.user.inc.sidebar')
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    @include('bakend.user.inc.topbar')
                    <!-- Content -->
                    @yield('content')
                    <!-- / Content -->
                    <!-- Footer -->
                    @include('bakend.inc.footer')
                    <!-- / Footer -->
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    @include('bakend.inc.footerscript')
