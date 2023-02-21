<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Shop - Bestmedsys</title>
    <link rel="apple-touch-icon" href="{{asset('app-assets/images/ico/apple-icon-120.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('app-assets/images/ico/favicon.ico')}}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

   @include('layouts.Interface._styles')

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu content-detached-left-sidebar navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="content-detached-left-sidebar">

    <!-- BEGIN: Header-->
    @include('layouts.Interface._header')
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    {{-- @include('layouts.Interface._menu') --}}
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ecommerce-application pt-5">
        <div class="content-overlay"></div>
        {{-- <div class="header-navbar-shadow"></div> --}}
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            {{-- @yield('breadcrumbs') --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-detached content-right">
                <div class="content-body">
                    <!-- E-commerce Content Section Starts -->
                    <section id="ecommerce-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="ecommerce-header-items">
                                    <div class="result-toggler">
                                        <button class="navbar-toggler shop-sidebar-toggler" type="button" data-toggle="collapse">
                                            <span class="navbar-toggler-icon d-block d-lg-none"><i data-feather="menu"></i></span>
                                        </button>
                                    </div>
                                    <div class="view-options d-flex">
                                        <div class="btn-group dropdown-sort">
                                            <button type="button" class="btn btn-outline-primary dropdown-toggle mr-1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="active-sorting">Featured</span>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="javascript:void(0);">Featured</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Lowest</a>
                                                <a class="dropdown-item" href="javascript:void(0);">Highest</a>
                                            </div>
                                        </div>
                                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                            <label class="btn btn-icon btn-outline-primary view-btn grid-view-btn">
                                                <input type="radio" name="radio_options" id="radio_option1" checked />
                                                <i data-feather="grid" class="font-medium-3"></i>
                                            </label>
                                            <label class="btn btn-icon btn-outline-primary view-btn list-view-btn">
                                                <input type="radio" name="radio_options" id="radio_option2" />
                                                <i data-feather="list" class="font-medium-3"></i>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- E-commerce Content Section Starts -->

                    <!-- background Overlay when sidebar is shown  starts-->
                    <div class="body-content-overlay"></div>
                    <!-- background Overlay when sidebar is shown  ends-->

                    <!-- E-commerce Search Bar Starts -->
                    @yield('searchBar')
                    <!-- E-commerce Search Bar Ends -->

                    <!-- E-commerce Products Starts -->
                    @yield('content')
                    <!-- E-commerce Products Ends -->

                    <!-- E-commerce Pagination Starts -->
                    <section id="ecommerce-pagination">
                        <div class="row">
                            <div class="col-sm-12">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination justify-content-center mt-2">
                                        <li class="page-item prev-item"><a class="page-link" href="javascript:void(0);"></a></li>
                                        <li class="page-item active"><a class="page-link" href="javascript:void(0);">1</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">2</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">3</a></li>
                                        <li class="page-item" aria-current="page"><a class="page-link" href="javascript:void(0);">4</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">5</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">6</a></li>
                                        <li class="page-item"><a class="page-link" href="javascript:void(0);">7</a></li>
                                        <li class="page-item next-item"><a class="page-link" href="javascript:void(0);"></a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </section>
                    <!-- E-commerce Pagination Ends -->

                </div>
            </div>
            {{--     !       side Bar        !        --}}
            @yield('sideBar')
            {{--     !     end side Bar      !      --}}
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    @include('layouts.Interface._footer')
    <!-- END: Footer-->

    @include('layouts.Interface._scripts')
</body>
<!-- END: Body-->

</html>