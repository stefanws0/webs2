<?php

namespace App\Http\Controllers;

use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|max:20',
            'description' => 'required|max:50',
            'price' => 'required|max:6'
        ]);

        Product::create(request(['name', 'description', 'price']));

        return redirect('/products');
    }
}
