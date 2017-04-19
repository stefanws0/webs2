<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
// use App\Models\Cart;
// use Illuminate\http\Request;
//
// use Session;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        // $products = DB::table('products')->get();
        $products = DB::table('products')->select('products.*', 'categories.name as nation')->join('categories', 'products.category_id', '=', 'categories.id')->get();
        // if($category = request('category')){
        //     $products = Product::where('category_id', $category)->get();
        //     $categoryName = Category::where('id', $category)->value('name');
        // }else{
        //     $products = Product::all();
        // }
        return view('dashboard.products', compact('products'));
    }
  }
