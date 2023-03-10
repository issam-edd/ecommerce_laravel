<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        return view('cart.index')->with([
            "items" => \Cart::getContent()
        ]);
    }

    //add item to cart
    public function addProductToCart(Product $product)
    {
        \Cart::add(array(
            "id" => $product->id,
            "name" => $product->title,
            "price" => $product->price,
            "attributes" => array(),
            "associatedModel" => $product,
        ));
        return redirect()->route('cart.index');
    }
    //remove item from cart
    public function removeProductFromCart(Request $request, Product $product)
    {
        \Cart::remove($product->id);
        return redirect()->route('cart.index');
    }
}
