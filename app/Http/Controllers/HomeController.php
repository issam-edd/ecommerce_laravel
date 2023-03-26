<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with([
            "products" => Product::latest()->paginate(9),
            "categories" => Category::has("products")->get(),
        ]);
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function GetProductByCategory(Category $category)
    {
        $products = $category->products()->paginate(9);
        return view('home')->with([
            "products" => $products,
            "categories" => Category::has("products")->get(),
        ]);
    }

    /**
     * Show the application home.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function SearchProduct()
    {
        $search_text = $_GET['query'];
        return view('home')->with([
            "products" => Product::where('slug', 'like', '%' . $search_text . '%')->get(),
            "categories" => Category::has("products")->get(),
        ]);
    }
    public function show(Product $product)
    {
        return view('products.show')->with([
            "product" => $product,
        ]);
    }
    

    // public function SearchProduct(Request $request)
    // {
    //     $search_text = $request->input('query');
    //     return view('home')->with([
    //         "products" => Product::where('slug', 'like', '%' . $search_text . '%')->get(),
    //         "categories" => Category::has("products")->get(),
    //     ]);
    // }
}
