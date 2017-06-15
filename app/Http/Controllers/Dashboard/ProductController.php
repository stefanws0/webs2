<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\User\UpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{

    /**
     * Show a list of products.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        if ($request->has('q')) {
            $query = $request->get('q');

            $products = Product::where('name', 'like', '%'.$query.'%')->paginate(15);
        } else {
            $products = Product::orderBy('name')->paginate(15);
        }

        return view('dashboard.products', compact('products'));
    }

    /**
     * Edit the given products.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product  $product)
    {
        return view('dashboard.product.edit', compact('product'));
    }

    /**
     * Update the given product.
     *
     * @param  \App\Http\Requests\Product\UpdateRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateRequest $request, Product $product)
    {
        $request->persist();

        return redirect()->route('dashboard.products');
    }

    public function delete(Product $product){
        $product->delete();
        $products = Product::orderBy('name')->paginate(15);
        return view('dashboard.products', compact('products'));
    }
}
{

}