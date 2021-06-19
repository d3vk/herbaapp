<?php

namespace App\Http\Controllers;

use App\Models\MerchantPayment;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
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
        $totalPrice = 0;
        for ($i = 0; $i < $carts->count(); $i++) {
            $totalPrice += $carts[$i]->quantity * $carts[$i]->product[0]->price;
        }
        $availablePayments = MerchantPayment::where('merchant_id', Auth::user()->id)->get();
        return view('cart', compact('carts', 'totalPrice', 'availablePayments'));
    }

    public function store(Request $request)
    {
        $uid = Auth::user()->id;

        $validated = $request->validate([
            'quantity' => ['required'],
            'product_id' => ['required'],
        ]);

        if ($validated) {
            $merchant_id = Product::find($request->product_id)->merchant->id;
            $availableBefore = OrderItem::where('product_id', $request->product_id)->where('is_in_cart', 1)->where('user_id', $uid)->first();
            if ($availableBefore !== null) {
                $availableBefore->update([
                    'quantity' => $availableBefore->quantity + $request->quantity,
                ]);
            } else {
                OrderItem::create([
                    'user_id' => $uid,
                    'product_id' => $request->product_id,
                    'merchant_id' => $merchant_id,
                    'quantity' => $request->quantity,
                ]);
            }
        }
        return redirect()->route('marketplace');
    }

    public function destroy($id)
    {
        OrderItem::find($id)->delete();
        return redirect()->route('cart')->with('success', 'Berhasil menghapus item dari keranjang Anda');
    }
}
