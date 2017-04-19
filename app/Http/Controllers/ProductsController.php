<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Cart;
use Illuminate\http\Request;
use App\Http\Requests\Product\StoreRequest;

use Session;

class ProductsController extends Controller
{

    /**
    * ProductController constructor.
    */
    public function __construct()
    {
        $this->middleware('auth', [
            'only' => ['create', 'store', 'edit', 'update']
        ]);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $reviews = $product->reviews()->latest()->get();
        return view('products.show', compact('product', 'reviews'));
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
    public function store(StoreRequest $request)
    {
        $product = $request->persist();

        return redirect()->route('posts.show', $product);
    }

}
