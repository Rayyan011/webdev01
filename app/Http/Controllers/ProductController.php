<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    // Display a list of all products
    public function index(){
        $products = Product::all();
        return view('products.index', ['products' => $products]);
    }

    // Show the form for creating a new product
    public function create(){
        return view("products.create");
    }

    // Store a newly created product in the database
    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'quality' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);
        
        $newProduct = Product::create($data);

        return redirect(route('product.index'));
    }

    // Show the form for editing the specified product
    public function edit(Product $product){
        return view('products.edit', ['product' => $product]);
    }

    // Update the specified product in the database
    public function update(Product $product, Request $request){
        $data = $request->validate([
            'name' => 'required',
            'quality' => 'required',
            'qty' => 'required|numeric',
            'price' => 'required|decimal:0,2',
            'description' => 'nullable'
        ]);

        $product->update($data);

        return redirect(route('product.index'))->with('success', 'Product Updated Successfully');
    }

    // Remove the specified product from the database
    public function destroy(Product $product){
        $product->delete();
        return redirect(route('product.index'))->with('success', 'Product deleted Successfully');
    }
}
