@extends('layouts.Interface.eshop')
@section('breadcrumbs')
<h2 class="content-header-title float-left mb-0">Shop</h2>
<div class="breadcrumb-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.html">Home</a>
        </li>
        <li class="breadcrumb-item"><a href="#">eCommerce</a>
        </li>
        <li class="breadcrumb-item active">Shop
        </li>
    </ol>
</div>
@endsection
@section('searchBar')
<section id="ecommerce-searchbar" class="ecommerce-searchbar">
    <div class="row mt-1">
        <div class="col-sm-12">
            <form method="GET" action="{{ route('products.search') }}">
                @csrf
            <div class="input-group input-group-merge">
                <input type="search" class="form-control search-product" name="query" id="shop-search" placeholder="Search Product" aria-label="Search..." aria-describedby="shop-search" />
                <div class="input-group-append">
                    <span class="input-group-text"><i data-feather="search" class="text-muted"></i></span>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>
@endsection
@section('content')
<!-- E-commerce Products Starts -->
<section id="ecommerce-products" class="grid-view">
    @forelse ($products as $product)
    <div class="card ecommerce-card">
        <div class="item-img text-center">
            <a href="{{ route('products.show',$product) }}">
                <img class="img-fluid card-img-top" src="{{ $product->image }}" alt="img-placeholder" />
            </a>
        </div>
        <div class="card-body">
            <div class="item-wrapper">
                <div>
                    <h6 class="item-price">{{ $product->price }} DH</h6>
                </div>
                <div class="item-price text-danger">
                    <strike>{{ $product->old_price }} DH</strike>
                </div>
            </div>
            <h6 class="item-name">
                <a class="text-body" href="{{ route('products.show',$product) }}">{{ $product->title }} </a>
            </h6>
            <p class="card-text item-description">
                {{ $product->description }}
            </p>
        </div>
        <div class="item-options text-center">
            <div class="item-wrapper">
                <div class="item-cost">
                    <h4 class="item-price">{{ $product->price }} DH</h4>
                </div>
            </div>
            <a href="javascript:void(0)" class="btn btn-primary btn-cart">
                <i data-feather="shopping-cart"></i>
                <span class="add-to-cart">Add to cart</span>
            </a>
        </div>
    </div>
    @empty
    <p>There is no such Item !</p>
    @endforelse
    {{-- <div class="card ecommerce-card">
        <div class="item-img text-center">
            <a href="app-ecommerce-details.html">
                <img class="img-fluid card-img-top" src="{{asset('app-assets/images/pages/eCommerce/2.png')}}" alt="img-placeholder" />
            </a>
        </div>
        <div class="card-body">
            <div class="item-wrapper">
                <div class="item-rating">
                    <ul class="unstyled-list list-inline">
                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                        <li class="ratings-list-item"><i data-feather="star" class="filled-star"></i></li>
                    </ul>
                </div>
                <div>
                    <h6 class="item-price">$669.99</h6>
                </div>
            </div>
            <h6 class="item-name">
                <a class="text-body" href="app-ecommerce-details.html">Apple iPhone 11 (64GB, Black)</a>
                <span class="card-text item-company">By <a href="javascript:void(0)" class="company-name">Apple</a></span>
            </h6>
            <p class="card-text item-description">
                The Apple iPhone 11 is a great smartphone, which was loaded with a lot of quality features. It comes with a
                waterproof and dustproof body which is the key attraction of the device. The excellent set of cameras offer
                excellent images as well as capable of recording crisp videos. However, expandable storage and a fingerprint
                scanner would have made it a perfect option to go for around this price range.
            </p>
        </div>
        <div class="item-options text-center">
            <div class="item-wrapper">
                <div class="item-cost">
                    <h4 class="item-price">$699.99</h4>
                </div>
            </div>
            <a href="javascript:void(0)" class="btn btn-light btn-wishlist">
                <i data-feather="heart" class="text-danger"></i>
                <span>Wishlist</span>
            </a>
            <a href="javascript:void(0)" class="btn btn-primary btn-cart">
                <i data-feather="shopping-cart"></i>
                <span class="add-to-cart">Add to cart</span>
            </a>
        </div>
    </div> --}}
</section>
<!-- E-commerce Products Ends -->
@endsection

@section('sideBar')
<div class="sidebar-detached sidebar-left">
    <div class="sidebar">
        <!-- Ecommerce Sidebar Starts -->
        <div class="sidebar-shop">
            <div class="row">
                <div class="col-sm-12">
                    <h6 class="filter-heading d-none d-lg-block">Filters</h6>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <!-- Price Filter starts -->
                    <div class="multi-range-price">
                        <h6 class="filter-title mt-0">Multi Range</h6>
                        <ul class="list-unstyled price-range" id="price-range">
                            <li>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="priceAll" name="price-range" class="custom-control-input" checked />
                                    <label class="custom-control-label" for="priceAll">All</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="priceRange1" name="price-range" class="custom-control-input" />
                                    <label class="custom-control-label" for="priceRange1">&lt;=$10</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="priceRange2" name="price-range" class="custom-control-input" />
                                    <label class="custom-control-label" for="priceRange2">$10 - $100</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="priceARange3" name="price-range" class="custom-control-input" />
                                    <label class="custom-control-label" for="priceARange3">$100 - $500</label>
                                </div>
                            </li>
                            <li>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="priceRange4" name="price-range" class="custom-control-input" />
                                    <label class="custom-control-label" for="priceRange4">&gt;= $500</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- Price Filter ends -->

                    <!-- Categories Starts -->
                    <div id="product-categories">
                        <h6 class="filter-title">Categories</h6>
                        <ul class="list-group list-group-flush active">
                            @forelse ($categories as $category)
                            <li class="list-group-item">    
                                <a class="list-group list-group-flush-action" href="{{route('category.products',$category->slug)}}">
                                    {{$category->title }} 
                                    {{$category->products->count() }} 
                                </a>
                            </li>      
                            @empty
                            <li class="list-group-item">
                                No such Items !
                            </li> 
                            @endforelse
                        </ul>
                    </div>
                    <!-- Categories Ends -->

                    <!-- Brands starts -->

                    <!-- Brand ends -->

                    <!-- Rating starts -->

                    <!-- Rating ends -->

                    <!-- Clear Filters Starts -->
                    {{-- <div id="clear-filters">
                        <button type="button" class="btn btn-block btn-primary">Clear All Filters</button>
                    </div> --}}
                    <!-- Clear Filters Ends -->
                </div>
            </div>
        </div>
        <!-- Ecommerce Sidebar Ends -->

    </div>
</div>
@endsection