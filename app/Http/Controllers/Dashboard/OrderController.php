<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Product\UpdateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
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

            $orders = Order::where('id', 'like', '%' . $query . '%')->paginate(15);
        } else {
            $orders = Order::orderBy('id')->paginate(15);
        }

        return view('dashboard.orders', compact('orders'));
    }

    public function destroy(Order $order){
        $order->delete();
        $orders = Order::orderBy('id')->paginate(15);
        return view('dashboard.orders', compact('orders'));
    }
}