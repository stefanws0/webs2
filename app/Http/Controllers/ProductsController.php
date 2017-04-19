<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Cart;
use Illuminate\http\Request;
use App\Http\Requests\Product\StoreRequest;

use Session;

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
            $categoryName = Category::where('id', $category)->value('name');
        }else{
            $products = Product::all();
        }
        return view('products.index', compact(['products', 'categoryName' ]));
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Product\StoreRequest $request
     *
     * @return \Illuminate\Http\Response
     */
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
