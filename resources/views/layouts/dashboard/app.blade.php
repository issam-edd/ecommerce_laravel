<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
    <!-- BEGIN: Head-->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
        <title>Bestmedsys Dashboard</title>

        @include('layouts.dashboard._styles')
    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->
    <body
        class="vertical-layout vertical-menu-modern  navbar-floating footer-static "
        data-open="click"
        data-menu="vertical-menu-modern"
        data-col=""
    >
        @include('layouts.dashboard._header')

        @include('layouts.dashboard._menu')

        <!-- BEGIN: Content-->
        <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <div class="row breadcrumbs-top">
                            <div class="col-12">
                                @yield('breadcrumbs')
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-body">

                    @yield('content')

                </div>
            </div>
        </div>
        <!-- END: Content-->

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        @include('layouts.dashboard._footer')

        @include('layouts.dashboard._scripts')
        
    </body>
    <!-- END: Body-->

</html>
