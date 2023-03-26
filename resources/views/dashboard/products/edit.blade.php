@extends('layouts.dashboard.app')


@section('content')
 <!-- Blog Edit -->
 <div class="blog-edit-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                @include('layouts.partials.alerts')
                <div class="card-body">
                    <!-- Form -->
                    <form  method="POST" action="{{ route('products.update',['product'=>$product->slug]) }}" class="mt-2" enctype="multipart/form-data">
                        @method('PUT')
                        @include('dashboard.products.form')
                        <button type="submit" class="btn btn-warning mr-1">Edit</button>
                    </div>
                </div>
            </form>       
                    <!--/ Form -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page-style')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/page-blog.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/vendors/css/forms/spinner/jquery.bootstrap-touchspin.css')}}">
@endsection
@section('page-script')
<script src="{{ asset('app-assets/js/scripts/forms/form-number-input.js')}}"></script>
<script src="{{ asset('app-assets/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js')}}"></script>
@endsection