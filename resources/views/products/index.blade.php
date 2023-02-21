@extends('layouts.interface.app')

@section('breadcrumbs')
<h2 class="content-header-title float-left mb-0">Shop</h2>
<div class="breadcrumb-wrapper">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href=" {{ route('articles.create') }} ">Create</a>
        </li>
    </ol>
</div>
@endsection

@section('content')
@include('partials._session')
<section id="wishlist" class="grid-view wishlist-items">
    @forelse ($articles as $article)
    <div class="card ecommerce-card">
        <div class="item-img text-center">
            <a href=" {{ route('articles.show',['article'=>$article->id]) }} ">
                @if ($article->id >=1 && $article->id <=5)
                    <img src=" {{$article->image->path??null}} " class="img-fluid" alt="img-placeholder" /> 
                @else
                    <img src=" {{Storage::url($article->image->path??null)}} " class="img-fluid" alt="img-placeholder" />  
                @endif
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
                        <li class="ratings-list-item"><i data-feather="star" class="unfilled-star"></i></li>
                    </ul>
                </div>
                <div class="item-cost">
                    <h6 class="item-price">{{ $article->price }}<?php echo" $" ?></h6>
                </div>
            </div>
            <div class="item-name">
                <a href="app-ecommerce-details.html">{{ $article->title }}</a>
            </div>
            <p class="card-text item-description">
                {{ $article->description }}
            </p>
        </div>
        <div class="item-options text-center">

            <form method="POST" action="{{ route('articles.destroy',['article'=>$article->id]) }}" >
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-light btn-danger">
                    <i data-feather="x"></i>
                    <span>Remove</span>
                </button>
            </form>
            
            <a class="btn btn-warning ml-2" 
            href=" {{route('articles.edit',['article'=>$article->id])}} ">
                <span>Edit</span>
            </a>
            
            <button type="button" class="btn btn-primary btn-cart move-cart">
                <i data-feather="shopping-cart"></i>
                <span class="add-to-cart">Move to cart</span>
            </button>
        </div>
    </div>
    @empty
    <p>Ther is no such Items !</p>
        
    @endforelse
</section>
<!-- Wishlist Ends -->
    
@endsection
