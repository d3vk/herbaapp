<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $uid = Auth::user()->id;
        $carts = OrderItem::where('user_id', $uid)->where('is_in_cart', 1)->get();
        return view('cart', compact('carts'));
    }

    public function store(Request $request)
    {
        $uid = Auth::user()->id;

        $validated = $request->validate([
            'quantity' => ['required'],
            'product_id' => ['required'],
        ]);

        if ($validated) {
            OrderItem::create([
                'user_id' => $uid,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
            ]);

        }
        return redirect()->route('marketplace');
    }
}
