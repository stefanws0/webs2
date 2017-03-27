<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Product $product)
    {
        $this->validate(request(), [
            'title' => 'required',
            'body' => 'required'
        ]);

        auth()->user()->publishReview(
            new Review([
                'title' => request('title'),
                'body' => request('body'),
                'user_id' => auth()->id(),
                'product_id' => $product->id
            ]));

        return back();
    }
}
