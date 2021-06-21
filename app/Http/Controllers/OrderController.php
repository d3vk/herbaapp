<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\MerchantPayment;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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

    public function waitingPayment()
    {
        $orders = Order::where('user_id', Auth::user()->id)->where('payment_method', null)->get();
        return view('transaction.waiting', compact('orders'));
    }

    public function choosePayment($id)
    {
        $order = Order::find($id);
        $merchant = Merchant::find($order->merchant_id);
        $payments = $merchant->paymentMethod;
        $merchantAccount = MerchantPayment::where('merchant_id', $order->merchant_id)->get();
        return view('transaction.choose-method', compact('order', 'payments', 'merchantAccount'));
        // dd($merchantAccount[0]->account);
    }

    public function pay($oid, $pid)
    {
        Order::find($oid)->update([
            'payment_method' => $pid,
            'status' => 'Pesanan dilanjutkan ke penjual'
        ]);
        // $data['payment'] = MerchantPayment::find($pid);
        // dd($data);
        return redirect()->route('waitingPayment')->with('success', 'Berhasil memilih metode pembayaran. Hubungi penjual untuk mengkonfirmasi pembayaran Anda.');
    }

    public function transactions()
    {
        $transactions = Order::where('user_id', Auth::user()->id)->whereNotNull('payment_method')->get();
        return view('transaction.list', compact('transactions'));
    }

    public function orders()
    {
        $mid = Merchant::where('admin_id', Auth::user()->id)->pluck('id');
        $orders = Order::where('merchant_id',$mid)->whereNotNull('payment_method')->paginate(10);
        return view('transaction.orders', compact('orders'));
    }

    public function detail($id)
    {
        $order = Order::find($id);
        return view('transaction.orderDetail', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::find($id);
        return view('transaction.editOrder', compact('order'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(['Pesanan dilanjutkan ke penjual','Sedang diproses','Sedang dikirim'])],
        ]);

        if ($validated) {
            Order::find($id)->update([
                'status' => $request->status,
            ]);
        }

        return redirect()->route('orders')->with('success', 'Berhasil mengubah status pesanan');
    }
}