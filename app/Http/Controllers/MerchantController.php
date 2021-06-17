<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MerchantController extends Controller
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
        $merchants = Merchant::paginate(10);
        return view('admin.merchant.index', compact('merchants'));
    }

    public function create()
    {
        return view('merchant.create');
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
            'name' => ['required', 'string', 'max:255', 'unique:merchants'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ]);

        if ($validated) {
            Merchant::create([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'admin_id' => Auth::user()->id,
            ]);
            return redirect()->route('home')->with('success', 'Selamat! Anda berhasil membuka toko baru');
        } else {
            return redirect()->route('home')->with('error', 'Gagal membuka toko')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Merchant::find($id)->delete();
        return redirect()->route('admin.merchant.index')->with('success', 'Toko berhasil dihapus');
    }
}
