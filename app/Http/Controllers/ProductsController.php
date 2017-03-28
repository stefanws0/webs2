<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class ProductsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {


        if($category = request('category')){
            $products = Product::where('category_id', $category)->get();
        }else{
            $products = Product::all();
        }
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
