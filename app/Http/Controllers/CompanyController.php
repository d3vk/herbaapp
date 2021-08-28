<?php

namespace App\Http\Controllers;

use App\Models\Company;
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
        if (!$company) {
            return view('company.empty');
        } else {
            return view('company.index', compact('company'));
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
            'name' => ['required', 'string', 'max:255', 'unique:companies'],
            'profile' => ['required', 'string'],
            'address' => ['required', 'string'],
            'phone' => ['required', 'string'],
        ]);

        if ($validated) {
            Company::create([
                'id' => Auth::user()->id,
                'name' => $request->name,
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
    public function show(company $company)
    {
        //
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
}
