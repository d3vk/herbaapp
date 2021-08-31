<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\MaklonJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::where('id', Auth::user()->id)->first();
        $done = MaklonJob::where('worker_id', Auth::user()->id)->where('status','Selesai')->count();
        $process = MaklonJob::where('worker_id', Auth::user()->id)->where('status','Dalam Proses')->count();
        if (!$company) {
            return view('company.empty');
        } else {
            return view('company.index', compact('company', 'done', 'process'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
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
            'profile' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ]);

        if ($validated) {
            Company::create([
                'id' => Auth::user()->id,
                'name' => Auth::user()->name,
                'profile' => $request->profile,
                'address' => $request->address,
                'phone' => $request->phone,
            ]);
            return redirect()->route('company.index')->with('success', 'Selamat! Anda berhasil membuka company');
        } else {
            return redirect()->route('company.index')->with('error', 'Gagal membuka company')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return view('showCompany', compact('company'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, company $company)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(company $company)
    {
        //
    }

    public function order()
    {
        $orders = MaklonJob::where('worker_id', Auth::user()->id)->get();
        return view('company.order', compact('orders'));
    }

    public function list()
    {
        $companies = Company::all();
        return view('listCompany', compact('companies'));
    }

    public function updateOrder(Request $request, $id)
    {
        $order = MaklonJob::find($id);
        $order->update([
            'status' => $request->status
        ]);
        return redirect()->route('company.order')->with('success', 'Berhasil mengubah status');
    }
}
