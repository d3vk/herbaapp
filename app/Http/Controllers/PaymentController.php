<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class PaymentController extends Controller
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
        $methods = Payment::paginate(10);
        return view('admin.payment.index', compact('methods'));
    }

    public function create()
    {
        return view('admin.payment.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'payment_name' => ['required'],
            'payment_method_img' => ['required'],
            'payment_instruction' => ['required'],
        ]);

        $payment_img = $request->file('payment_method_img');
        // dd($payment_img->getClientOriginalName());

        if ($payment_img !== null) {
            $imageName = str_replace(' ','_',$payment_img->getClientOriginalName());
            $payment_img->move(public_path('img'), $imageName);
        }

        if ($validated) {
            Payment::create([
                'payment_name' => $request->payment_name,
                'payment_method_img' => $imageName,
                'payment_instruction' => $request->payment_instruction
            ]);
            return redirect()->route('admin.payment.index')->with('success', 'Berhasil menambahkan metode pembayaran baru');
        } else {
            return redirect()->route('admin.payment.create')->with('error', 'Gagal menambahkan metode pembayaran baru');
        }
    }

    public function edit($id)
    {

    }

    public function update(Request $request)
    {

    }

    public function destroy($id)
    {
        Payment::find($id)->delete();
        return redirect()->route('admin.payment.index')->with('success', 'Berhasil menghapus metode pembayaran');
    }
}
