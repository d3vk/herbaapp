<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\User;
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
        return view('admin.merchant.create');
    }

    public function findUser(Request $request)
    {
        if ($request->has('q')) {
            $search = $request->q;
            $users = User::select('id', 'name')->where('name', 'LIKE', '%'.$search.'%')->get();
        }
        return response()->json($users);
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
            'admin_id' => ['required'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ]);

        if ($validated) {
            Merchant::create([
                'name' => $request->name,
                'address' => $request->address,
                'phone' => $request->phone,
                'admin_id' => $request->admin_id,
            ]);
            return redirect()->route('admin.merchant.index')->with('success', 'Selamat! Anda berhasil membuka toko baru');
        } else {
            return redirect()->route('admin.merchant.index')->with('error', 'Gagal membuka toko')->withInput();
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
