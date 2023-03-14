@extends('layouts.InterfaceCenter.appCenter')

@section('breadcrumbs')
<h2 class="content-header-title float-left mb-0">Checkout</h2>
<div class="breadcrumb-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
        </li>
        <li class="breadcrumb-item active">Checkout
        </li>
    </ol>
</div>
@endsection


@section('content')
    <!-- BEGIN: Content-->
          <div class="content-body"><div class="bs-stepper checkout-tab-steps">
            <!-- Wizard starts -->
            <div class="bs-stepper-header @if($items->count() <=0){{ 'd-none' }}@endif"">
            <div class="step" data-target="#step-cart">
                <button type="button" class="step-trigger">
                <span class="bs-stepper-box">
                    <i data-feather="shopping-cart" class="font-medium-3"></i>
                </span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">Cart</span>
                    <span class="bs-stepper-subtitle">Your Cart Items</span>
                </span>
                </button>
            </div>
            @Auth
            <div class="line">
                <i data-feather="chevron-right" class="font-medium-2"></i>
            </div>
            <div class="step" data-target="#step-address">
                <button type="button" class="step-trigger">
                <span class="bs-stepper-box">
                    <i data-feather="home" class="font-medium-3"></i>
                </span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">Address</span>
                    <span class="bs-stepper-subtitle">Enter Your Address</span>
                </span>
                </button>
            </div>
            <div class="line">
                <i data-feather="chevron-right" class="font-medium-2"></i>
            </div>
            <div class="step" data-target="#step-payment">
                <button type="button" class="step-trigger">
                <span class="bs-stepper-box">
                    <i data-feather="credit-card" class="font-medium-3"></i>
                </span>
                <span class="bs-stepper-label">
                    <span class="bs-stepper-title">Payment</span>
                    <span class="bs-stepper-subtitle">Select Payment Method</span>
                </span>
                </button>
            </div>
            @endAuth
            </div>
            <!-- Wizard ends -->

    @include('layouts.partials.alerts')
    <div class="bs-stepper-content">
      <!-- Checkout Place order starts -->
      <div id="step-cart" class="content">
        <div id="place-order" class="list-view product-checkout">
          <!-- Checkout Place Order Left starts -->
          <div class="checkout-items">
             @forelse($items as $item)
            <div class="card ecommerce-card">
              <div class="item-img">
                <a href="app-ecommerce-details.html">
                  <img src="{{ $item->associatedModel->image }}" alt="img-placeholder" />
                </a>
              </div>
              <div class="card-body">
                <div class="item-name">
                  <h6 class="mb-0"><a href="app-ecommerce-details.html" class="text-body">{{ $item->name }}</a></h6>
                  {{-- <span class="item-company">By <a href="javascript:void(0)" class="company-name">Apple</a></span> --}}
                </div>
                <span class="text-success mb-1">In Stock</span>
                <form class="d-flex flex-row " method="post" action=" {{ route('update.cart',$item->associatedModel->slug) }}">
                    @csrf
                    @method('PUT')
                    <div class="item-quantity">
                        <span class="quantity-title">Qty:</span>
                            <div class="input-group quantity-counter-wrapper">
                                <input type="text" name="quantity" class="quantity-counter" max="{{ $item->associatedModel->inStock }}" value="{{ $item->quantity }}" />
                            </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-warning">
                        <i class="fa fa-edit"></i>
                    </button>
                </form>
              </div>
              <div class="item-options text-center">
                <div class="item-wrapper">
                  <div class="item-cost">
                    <h4 class="item-price">{{ $item->price * $item->quantity }} DH</h4>
                    <p class="card-text shipping">
                      <span class="badge badge-pill badge-light-success">Free Shipping</span>
                    </p>
                  </div>
                </div>
                <form class="ml-3" method="post" action="{{ route('remove.cart',$item->associatedModel->slug) }} ">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger mt-1 ">
                        <i data-feather="x" class="align-middle mr-25"></i>
                        <span>Remove</span>
                    </button>
                </form>
                {{-- <button type="button" class="btn btn-primary btn-cart move-cart">
                  <i data-feather="heart" class="align-middle mr-25"></i>
                  <span class="text-truncate">Add to Wishlist</span>
                </button> --}}
              </div>
            </div>
            @empty
            <div>
                There is no such Items !
            </div>
            @endforelse
            </div>
          <!-- Checkout Place Order Left ends -->
  
          <!-- Checkout Place Order Right starts -->
          <div class="checkout-options @if($items->count() <=0){{ 'd-none' }}@endif">
            <div class="card">
              <div class="card-body">
                <label class="section-label mb-1">Options</label>
                <div class="coupons input-group input-group-merge">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Coupons"
                    aria-label="Coupons"
                    aria-describedby="input-coupons"
                  />
                  <div class="input-group-append">
                    <span class="input-group-text text-primary" id="input-coupons">Apply</span>
                  </div>
                </div>
                <hr />
                <div class="price-details">
                  <h6 class="price-title">Price Details</h6>
                  <ul class="list-unstyled">
                    <li class="price-detail">
                      <div class="detail-title">Total MRP</div>
                      <div class="detail-amt">{{ Cart::getSubtotal() }} DH</div>
                    </li>
                    <li class="price-detail">
                      <div class="detail-title">Bag Discount</div>
                      <div class="detail-amt discount-amt text-success">0 DH</div>
                    </li>
                    <li class="price-detail">
                      <div class="detail-title">Estimated Tax</div>
                      <div class="detail-amt">0 DH</div>
                    </li>
                    <li class="price-detail">
                      <div class="detail-title">Delivery Charges</div>
                      <div class="detail-amt discount-amt text-success">Free</div>
                    </li>
                  </ul>
                  <hr />
                  <ul class="list-unstyled">
                    <li class="price-detail">
                      <div class="detail-title detail-total">Total</div>
                      <div class="detail-amt font-weight-bolder">{{ Cart::getSubtotal() }} DH</div>
                    </li>
                  </ul>
                  @if(auth()->user())
                  <button type="button" class="btn btn-primary btn-block btn-next place-order">Place Order</button>
                  @else
                  <a href="{{ route('login') }}" class="btn btn-primary btn-block">Place Order</a>
                  @endif
                </div>
              </div>
            </div>
            <!-- Checkout Place Order Right ends -->
          </div>
        </div>
        <!-- Checkout Place order Ends -->
      </div>
      <!-- Checkout Customer Address Starts -->
      @Auth
      <div id="step-address" class="content">
        <form method="POST" action="{{ route('user.update',auth()->id())}}" id="checkout-address" class="list-view product-checkout">
          @csrf
          <!-- Checkout Customer Address Left starts -->
          <div class="card">
            <div class="card-header flex-column align-items-start">
              <h4 class="card-title">Add New Address</h4>
              <p class="card-text text-muted mt-25">Be sure to check "Deliver to this address" when you have finished</p>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-6 col-sm-12">
                  <div class="form-group mb-2">
                    <label for="checkout-name">Full Name:</label>
                    <input type="text" id="checkout-name" class="form-control" name="name" value="{{auth()->user()->name}}"  />
                  </div>
                </div>
                {{-- <div class="col-md-6 col-sm-12">
                  <div class="form-group mb-2">
                    <label for="checkout-number">Mobile Number:</label>
                    <input
                      type="number"
                      id="checkout-number"
                      class="form-control"
                      name="mnumber"
                      placeholder="0123456789"
                    />
                  </div>
                </div> --}}
                <div class="col-md-6 col-sm-12">
                  <div class="form-group mb-2">
                    <label for="checkout-city">Address</label>
                    <input type="text" id="checkout-city" class="form-control" name="address" value="{{auth()->user()->address}}" />
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group mb-2">
                    <label for="checkout-city">Town/City:</label>
                    <input type="text" id="checkout-city" class="form-control" name="city" value="{{auth()->user()->city}}"  />
                  </div>
                </div>
                <div class="col-md-6 col-sm-12">
                  <div class="form-group mb-2">
                    <label for="checkout-state">Country</label>
                    <input type="text" id="checkout-state" class="form-control" name="country" value="{{auth()->user()->country}}" />
                  </div>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary">Save And Deliver Here</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Checkout Customer Address Left ends -->
  
          <!-- Checkout Customer Address Right starts -->
          <div class="customer-card">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">{{auth()->user()->name}}</h4>
              </div>
              <div class="card-body actions">
                <p class="card-text mb-t">{{auth()->user()->email}}</p>
                <p class="card-text mb-0">{{auth()->user()->address}}</p>
                <p class="card-text mb-0">{{auth()->user()->city}}</p>
                <p class="card-text mb-0">{{auth()->user()->country}}</p>
                <button type="button" class="btn btn-primary btn-block btn-next delivery-address mt-2">
                  Deliver To This Address
                </button>
              </div>
            </div>
          </div>
          <!-- Checkout Customer Address Right ends -->
        </form>
      </div>
      @endAuth
      <!-- Checkout Customer Address Ends -->
  
      <!-- Checkout Payment Starts -->
      <div id="step-payment" class="content">
        <form id="checkout-payment" class="list-view product-checkout" onsubmit="return false;">
          <div class="payment-type">
            <div class="card">
              <div class="card-header flex-column align-items-start">
                <h4 class="card-title">Payment options</h4>
                <p class="card-text text-muted mt-25">Be sure to click on correct payment option</p>
              </div>
              <div class="card-body">
                <h6 class="card-holder-name my-75">John Doe</h6>
                <div class="custom-control custom-radio">
                  <input type="radio" id="customColorRadio1" name="paymentOptions" class="custom-control-input" checked />
                  <label class="custom-control-label" for="customColorRadio1">
                    Make payment with PayPal
                  </label>
                </div>
                <div class="customer-cvv mt-1">
                  <div class="form-inline">
                    <a href="{{ route('make.payment') }}" class="btn btn-primary btn-block"><i class="fa fa-paypal"></i> PayPal</a>
                  </div>
                </div>
                {{-- <hr class="my-2" />
                <ul class="other-payment-options list-unstyled">
                  <li class="py-50">
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customColorRadio5" name="paymentOptions" class="custom-control-input" />
                      <label class="custom-control-label" for="customColorRadio5"> Cash On Delivery </label>
                    </div>
                  </li>
                </ul> --}}
              </div>
            </div>
          </div>
          <div class="amount-payable checkout-options">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Price Details</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled price-details">
                  <li class="price-detail">
                    <div class="details-title">Price of {{ Cart::getContent()->count() }} items</div>
                    <div class="detail-amt">
                      <strong>{{ Cart::getSubtotal() }} DH</strong>
                    </div>
                  </li>
                  <li class="price-detail">
                    <div class="details-title">Delivery Charges</div>
                    <div class="detail-amt discount-amt text-success">Free</div>
                  </li>
                </ul>
                <hr />
                <ul class="list-unstyled price-details">
                  <li class="price-detail">
                    <div class="details-title">Amount Payable</div>
                    <div class="detail-amt font-weight-bolder">{{ Cart::getSubtotal() }} DH</div>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </form>
      </div>
      <!-- Checkout Payment Ends -->
      <!-- </div> -->
    </div>
  </div>
  
          </div>
      <!-- END: Content-->
@endsection

@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/wizard/bs-stepper.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/form-wizard.min.css')}}">
@endsection
@section('script')
<script src="{{asset('app-assets/vendors/js/forms/wizard/bs-stepper.min.js')}}"></script>
<script src="{{asset('app-assets/vendors/js/extensions/swiper.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/pages/app-ecommerce-checkout.min.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/forms/form-number-input.js')}}"></script>
@endsection