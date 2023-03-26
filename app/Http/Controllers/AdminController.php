<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin')->except(['showAdminLoginForm', 'adminLogin']);
    }

    public function index()
    {
        $sales = 0;
        $products = Product::all();
        $orders = Order::all();
        $users = User::all();
        foreach ($orders as $order) {
            $sales += $order->qty;
        }
        $Revenue = 0;
        foreach ($orders as $order) {
            $Revenue += $order->qty * $order->price;
        }
        return view('dashboard.home', compact('products', 'orders', 'users', 'sales', 'Revenue'));
    }
    public function showAdminLoginForm()
    {
        if (auth()->guard('admin')->check()) {
            return redirect('/admin');
        }
        return view('admin.auth.login');
    }
    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ]);

        if (auth()->guard('admin')->attempt([
            'email' => $request->email,
            'password' => $request->password,
        ], $request->get('remember'))) {
            return redirect()->route('admin.index');
        } else {
            //session()->flash('errorLink', __('login or password not valid'));
            return redirect()->route('admin.login')
                ->with(['errorLink' => 'login or password not valid']);
        }
    }

    public function adminLogout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('admin.login');
    }

    public function GetProducts()
    {
    }
    public function GetOrders()
    {
    }
}
