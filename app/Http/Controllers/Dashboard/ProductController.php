<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Product\UpdateRequest;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Input;
use Intervention\Image\Facades\Image;

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


    public function create()
    {
        $categories = Category::all();
        return view('dashboard.product.create', compact('categories'));
    }

    public function store(Request $request)
    {
            $product = Product::create([
                'name' => request('name'),
                'description' => request('description'),
                'price' => request('price'),
                'category_id' => request('category_id')
            ]);
        if(Input::file())
        {
            $image = Input::file('image');
            $filename = $product->id . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/' . $filename);
            $path = preg_replace('/\\.[^.\\s]{3,4}$/', '', $path);
            $path = $path . '.jpg';
            Image::make($image->getRealPath())->resize(200, 300)->encode('jpg', 80)->save($path);
        }


        return redirect()->route('dashboard.products.index');
    }

    /**
     * Edit the given products.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product  $product)
    {
        $categories = Category::all();
        $selectedCategory = $product->category_id;
        return view('dashboard.product.edit', compact('product', 'categories', 'selectedCategory'));
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

        return redirect()->route('dashboard.products.index');
    }

    public function destroy(Product $product){

        $product->delete();
        $products = Product::orderBy('name')->paginate(15);
        return view('dashboard.products.index', compact('products'));
    }
}
{

}