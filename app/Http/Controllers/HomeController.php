<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function admin()
    {
        return view('admin.index');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $uid = Auth::user()->id;
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        if ($validated) {
            User::find($uid)->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
            return redirect()->route('profile')->with('success', 'Data Anda berhasil diperbarui');
        } else {
            return redirect()->route('profile')->with('error', 'Gagal memperbarui data Anda')->withInput($request->except('password'));
        }
    }
}
