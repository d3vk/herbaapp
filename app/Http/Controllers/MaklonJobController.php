<?php

namespace App\Http\Controllers;

use App\Models\MaklonJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaklonJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'keterangan' => ['required'],
        ]);

        if ($validated) {
            MaklonJob::create([
                'client_id' => Auth::user()->id,
                'worker_id' => $request->worker_id,
                'status' => "Dalam Proses",
                'keterangan' => $request->keterangan,
            ]);
            return redirect()->route('maklon.myorder')->with('success', 'Berhasil menyewa pekerja');
        } else {
            return redirect()->route('maklon.myorder')->with('error', 'Gagal menyewa pekerja');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\maklon_job  $maklon_job
     * @return \Illuminate\Http\Response
     */
    public function show(MaklonJob $maklon_job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\maklon_job  $maklon_job
     * @return \Illuminate\Http\Response
     */
    public function edit(MaklonJob $maklon_job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\maklon_job  $maklon_job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MaklonJob $maklon_job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\maklon_job  $maklon_job
     * @return \Illuminate\Http\Response
     */
    public function destroy(MaklonJob $maklon_job)
    {
        //
    }

    public function list()
    {
        $orders = MaklonJob::where('client_id', Auth::user()->id)->get();
        return view('myOrder', compact('orders'));
    }
}
