<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Product $product)
    {
        $product->addReview(request('body'), request('title'));

        return back();
    }
}
