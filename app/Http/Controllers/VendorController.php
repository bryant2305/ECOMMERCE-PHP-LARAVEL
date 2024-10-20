<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:vendor');
    }

    public function dashboard()
    {
        return view('vendor.dashboard');
    }

    public function manageProducts()
    {
        $products = Product::where('vendor_id', Auth::id())->get();
        return view('vendor.manage_products', compact('products'));
    }
    public function addProductForm()
    {
        return view('vendor.add_product');
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0'
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->vendor_id = Auth::id();
        $product->save();

        return redirect()->route('vendor.manageProducts')->with('success', 'Product added successfully.');
    }

    public function editProductForm(Product $product)
    {
        if ($product->vendor_id !== Auth::id()) {
            return abort(403);
        }

        return view('vendor.edit_product', compact('product'));
    }

    public function editProduct(Request $request, Product $product)
    {
        if ($product->vendor_id !== Auth::id()) {
            return abort(403);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0'
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('vendor.manageProducts')->with('success', 'Product updated successfully.');
    }

    public function deleteProduct(Product $product)
    {
        if ($product->vendor_id !== Auth::id()) {
            return abort(403);
        }

        $product->delete();
        return redirect()->route('vendor.manageProducts')->with('success', 'Product deleted successfully.');
    }

    public function manageStock()
    {
        $products = Product::where('vendor_id', Auth::id())->get();
        return view('vendor.manage_stock', compact('products'));
    }

    public function editStockForm(Product $product)
    {
      //Verify that the product belongs to the authenticated seller
        if ($product->vendor_id !== Auth::id()) {
            return abort(403);
        }

        return view('vendor.edit_stock', compact('product'));
    }

    public function updateStock(Request $request, Product $product)
    {
        $request->validate([
            'stock' => 'required|integer|min:0',
        ]);

        $product->stock = $request->stock;
        $product->save();

        return redirect()->route('vendor.manageStock')->with('success', 'Stock updated successfully');
    }

}
