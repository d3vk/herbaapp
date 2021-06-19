<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_item' => ['required'],
            'address' => ['required'],
        ]);

        $item_id = $request->order_item;
        $item = OrderItem::findMany($item_id);
        $mids = $item->unique('merchant_id')->pluck('merchant_id');

        $permitted_chars = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        function generate_string($input, $strlength = 16)
        {
            $input_length = strlen($input);
            $random_string = '';
            for ($i = 0; $i < $strlength; $i++) {
                $random_character = $input[mt_rand(0, $input_length - 1)];
                $random_string .= $random_character;
            }

            return $random_string;
        }

        if ($validated) {
            for ($i = 0; $i < $mids->count(); $i++) {
                $invoice = 'INV/' . date('Ymd') . '/' . generate_string($permitted_chars, 7) . '/' . $mids[$i];
                Order::create([
                    'invoice' => $invoice,
                    'user_id' => Auth::user()->id,
                    'address' => $request->address,
                    'merchant_id' => $mids[$i],
                ]);
                $carts = $item->where('merchant_id', $mids[$i]);
                foreach ($carts as $cart) {
                    $cart->update([
                        'order_invoice' => $invoice,
                        'is_in_cart' => 0,
                    ]);
                }
            }
            return redirect()->route('cart');
        } else {
            return redirect()->route('cart');
        }

        // if ($validated) {
        //     a::create([
        //         'name' => $request->name,
        //         'email' => $request->email,
        //         'password' => bcrypt($request->password),
        //         'is_admin' => $request->is_admin
        //     ]);
        //     return redirect()->route('admin.users.create')->with('success', 'Pengguna baru berhasil dibuat');
        // } else {
        //     return redirect()->route('admin.users.create')->with('error', 'Gagal membuat pengguna baru')->withInput($request->except('password'));
        // }
    }
}
