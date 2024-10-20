<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewProducts()
    {
        $products = Product::all();
        return view('customer.view_products', compact('products'));
    }

    public function dashboard()
    {
        return view('customer.dashboard');
    }
    public function addToCart(Request $request, Product $product)
    {

        $cart = Session::get('cart', []);


        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {

            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => 1,
            ];
        }


        Session::put('cart', $cart);

        return redirect()->route('customer.viewCart')->with('success', 'Product added to cart successfully.');
    }

    public function viewCart()
    {
        // Obtiene el carrito de la sesión
        $cart = Session::get('cart', []);
        return view('customer.view_cart', compact('cart')); 
    }
}
