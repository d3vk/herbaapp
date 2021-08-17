<?php

namespace App\Http\Controllers;

use App\Models\MerchantPayment;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantPaymentController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $methods = Payment::all();
        $availablePayments = MerchantPayment::where('merchant_id', Auth::user()->merchant->id)->paginate(10);
        return view('merchant.payment', compact('methods', 'availablePayments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'method_id' => ['required'],
            'account' => ['required'],
        ]);

        $merchant_id = Auth::user()->merchant->id;

        if ($validated) {
            MerchantPayment::create([
                'merchant_id' => $merchant_id,
                'method_id' => $request->method_id,
                'account' => $request->account,
            ]);
            return redirect()->route('payment.index')->with('success', 'Metode pembayaran berhasil ditambahkan');
        } else {
            return redirect()->route('payment.index')->with('error', 'Gagal menambah metode pembayaran');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MerchantPayment  $merchantPayment
     * @return \Illuminate\Http\Response
     */
    public function show(MerchantPayment $merchantPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MerchantPayment  $merchantPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(MerchantPayment $merchantPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MerchantPayment  $merchantPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MerchantPayment $merchantPayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MerchantPayment  $merchantPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(MerchantPayment $merchantPayment)
    {
        //
    }
}
