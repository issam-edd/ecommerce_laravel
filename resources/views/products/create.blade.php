@extends('layouts.interface.app')

@section('breadcrumbs')
<h2 class="content-header-title float-left mb-0">Create</h2>
<div class="breadcrumb-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=" {{ route('articles.index') }} ">Shop</a>
        </li>
    </ol>
</div>
@endsection

@section('content')
 <!-- Blog Edit -->
 <div class="blog-edit-wrapper">
    <div class="row">
        <div class="col-12">
            <div class="card">
                @include('partials._errors')
                <div class="card-body">
                    <!-- Form -->
                    <form  method="POST" action="{{ route('articles.store') }}" class="mt-2" enctype="multipart/form-data">
                        @csrf
                        @include('articles.form')
                                <button type="submit" class="btn btn-primary mr-1">Create</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
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