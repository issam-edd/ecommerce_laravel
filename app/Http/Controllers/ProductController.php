<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.products.index')->with([
            "products" => Product::latest()->paginate(4),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.products.create')->with([
            "categories" => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'price' => 'required|numeric',
            'old_price' => 'required|numeric',
            'inStock' => 'required|numeric',
            'category_id' => 'required|numeric',
            'price' => 'required',
        ]);

        if ($request->has('image')) {
            $file = $request->image;
            $imageName = "images/products/" . time() . "_" . $file->getClientOriginalName();
            $file->move(public_path("images/products"), $imageName);
            $title = $request->title;

            Product::create([
                'title' => $title,
                'slug' => Str::slug($title),
                'description' => $request->description,
                'price' => $request->price,
                'old_price' => $request->old_price,
                'inStock' => $request->inStock,
                'category_id' => $request->category_id,
                'image' => $imageName,
            ]);
            return redirect()->route("products.index")->withSuccess('Product created with success');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        // return view('products.show')->with([
        //     "product" => $product,
        // ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product = Product::findOrFail($product->id);
        $categories = Category::all();
        return view("dashboard.products.edit", compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:5',
            'image' => 'mimes:png,jpg,jpeg|max:2048',
            'price' => 'required|numeric',
            'old_price' => 'required|numeric',
            'inStock' => 'required|numeric',
            'category_id' => 'required|numeric',
            'price' => 'required',
        ]);

        if ($request->has('image')) {
            $image_path = public_path("images/products" . $product->image);
            if (File::exists($image_path)) {
                unlink($image_path);
            }
            $file = $request->image;
            $imageName = "images/products/" . time() . "_" . $file->getClientOridinalName();
            $file->move(public_path("images/products"), $imageName);
            $product->image = $imageName;
        }
        $title = $request->title;
        $product->update([
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $request->description,
            'price' => $request->price,
            'old_price' => $request->old_price,
            'inStock' => $request->inStock,
            'category_id' => $request->category_id,
            'image' => $product->image,
        ]);
        return redirect()->route("products.index")->withSuccess('Product updated with success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $image_path = public_path("images/products" . $product->image);
        if (File::exists($image_path)) {
            unlink($image_path);
        }
        $product->delete();
        return redirect()->back()->withSuccess('Product deleted with success');
    }
}
