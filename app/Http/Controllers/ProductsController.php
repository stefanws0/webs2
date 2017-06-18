<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Session;
use App\Models\Cart;

class ProductsController extends Controller
{
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

    public function getAddToCart(Request $request, $id) {
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);
        $request->session()->put('cart', $cart);
        return redirect()->route('products.index');
    }
    public function getReduceByOne($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        Session::put('cart', $cart);
        if($cart->totalPrice == 0){
            Session::forget('cart');
        }
        return redirect()->route('products.shoppingCart');
    }
    public function getRemoveItem($id)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        Session::put('cart', $cart);
        Session::forget('cart');
        return redirect()->route('products.shoppingCart');
    }

    public function getCart()
    {
        if (!Session::has('cart')) {
            return view('shop.cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.cart', ['products' => $cart->items,
            'totalPrice' => $cart->totalPrice]);
    }

    public function getCheckout()
    {
        if (!Session::has('cart')) {
            return view('shop.cart', ['products' => null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        $order = new Order();
        $order->cart = serialize($cart);
        $order->totalPrice = $total;

        Auth::user()->orders()->save($order);
        Session::forget('cart');
        return redirect()->route('products.index');
    }
}
