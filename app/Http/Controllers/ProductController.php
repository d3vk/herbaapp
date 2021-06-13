<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
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
        $products = Product::all();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'string'],
            'status' => ['required'],
            'short_description' => ['required', 'string'],
            'description' => ['required', 'string'],
            'good_for' => ['required', 'string'],
            'how_to' => ['required', 'string'],
            'ingredients' => ['required', 'string'],
        ]);

        if ($validated) {
            Product::create([
                'name' => $request->name,
                'merchant_id' => Auth::user()->merchant->id,
                'price' => $request->price,
                'status' => $request->status,
                'short_description' => $request->summary,
                'description' => $request->description,
                'good_for' => $request->good_for,
                'how_to' => $request->how_to,
                'ingredients' => $request->ingredients,
            ]);

            return redirect()->route('product.index')->with('success', 'Berhasil menambahkan produk baru');
        } else {
            return redirect()->route('product.index')->with('error', 'Gagal menambahkan produk');
        }
    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('product.edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required', 'string'],
            'status' => ['required'],
            'short_description' => ['required', 'string'],
            'description' => ['required', 'string'],
            'good_for' => ['required', 'string'],
            'how_to' => ['required', 'string'],
            'ingredients' => ['required', 'string'],
        ]);

        if ($validated) {
            Product::find($id)->update([
                'name' => $request->name,
                'merchant_id' => Auth::user()->merchant->id,
                'price' => $request->price,
                'status' => $request->status,
                'short_description' => $request->summary,
                'description' => $request->description,
                'good_for' => $request->good_for,
                'how_to' => $request->how_to,
                'ingredients' => $request->ingredients,
            ]);

            return redirect()->route('product.index')->with('success', 'Berhasil menambahkan produk baru');
        } else {
            return redirect()->route('product.index')->with('error', 'Gagal menambahkan produk');
        }
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus');
    }
}
