<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    // Manejo de proveedores
    public function showAddVendorForm()
    {
        return view('admin.vendor.vendor_form');
    }

    public function editVendorForm(User $vendor)
    {
        return view('admin.vendor.vendor_form', compact('vendor'));
    }

    public function manageVendors()
    {
        $vendors = User::all();
        $vendors = $vendors->where('role_id', 2);
        return view('admin.vendor.manage_vendors', compact('vendors'));
    }

    public function addVendor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        $vendor = new User();
        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->role_id = 2;
        $vendor->password = Hash::make($request->password);
        $vendor->save();

        $vendor->roles()->sync([2]);

        return redirect()->route('admin.vendor.manageVendors')->with('success', 'Vendor added successfully');
    }

    public function updateVendor(Request $request, User $vendor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $vendor->id,
        ]);

        $vendor->name = $request->name;
        $vendor->email = $request->email;
        $vendor->password = bcrypt('password');
        $vendor->save();

        return redirect()->route('admin.vendor.manageVendors')->with('success', 'Vendor updated successfully');
    }

    public function deleteVendor(User $vendor)
    {
        $vendor->delete();
        return redirect()->route('admin.vendor.manageVendors')->with('success', 'Vendor deleted successfully');
    }


    public function manageProducts()
    {
        $products = Product::all();
        return view('admin.products.manage_products', compact('products'));
    }

    public function showAddProductForm()
    {
        return view('admin.products.product_form');
    }

    public function addProduct(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->vendor_id = Auth::user()->id;
        $product->save();

        return redirect()->route('admin.products.manageProducts')->with('success', 'Product added successfully');
    }

    public function editProductForm(Product $product)
    {
        return view('admin.products.product_form', compact('product'));
    }

    public function updateProduct(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
        ]);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->save();

        return redirect()->route('admin.products.manageProducts')->with('success', 'Product updated successfully');
    }

    public function deleteProduct(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.manageProducts')->with('success', 'Product deleted successfully');
    }

    public function manageStock()
{
    $products = Product::all();
    return view('admin.stock.manage_stock', compact('products'));
}

public function addStock(Request $request, Product $product)
{
    $request->validate([
        'quantity' => 'required|integer|min:1',
    ]);

    $product->stock += $request->quantity;
    $product->save();

    return redirect()->route('admin.stock.manageStock')->with('success', 'Stock added successfully');
}

public function editStockForm(Product $product)
{
    return view('admin.stock.edit_stock', compact('product'));
}

public function updateStock(Request $request, Product $product)
{
    $request->validate([
        'stock' => 'required|integer|min:0',
    ]);

    $product->stock = $request->stock;
    $product->save();

    return redirect()->route('admin.stock.manageStock')->with('success', 'Stock updated successfully');
}

public function deleteStock(Product $product)
{
    $product->stock = 0; 
    $product->save();

    return redirect()->route('admin.stock.manageStock')->with('success', 'Stock deleted successfully');
}

}
