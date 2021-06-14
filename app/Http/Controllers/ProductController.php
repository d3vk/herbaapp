<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
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
        $uid = Merchant::where('admin_id', Auth::user()->id)->pluck('id');
        $products = Product::where('merchant_id', $uid[0])->paginate(10);
        return view('product.index', compact('products'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function store(Request $request)
    {
        $product_name = str_replace(' ', '-', $request->name);
        $date = date('Ymd');
        $slug = $date . '-' . $product_name;

        $validated = $request->validate([
            'name' => ['required', 'string'],
            'price' => ['required'],
            'status' => ['required'],
            'short_description' => ['required', 'string'],
            'description' => ['required'],
            'good_for' => ['required', 'string'],
            'how_to' => ['required', 'string'],
            'ingredients' => ['required', 'string'],
            'images' => ['required'],
        ]);

        foreach ($request->file('images') as $image) {
            $imageName = $date . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $imageName);
            $fileNames[] = $imageName;
        }

        if ($validated) {
            Product::create([
                'name' => $request->name,
                'merchant_id' => Auth::user()->merchant->id,
                'slug' => $slug,
                'price' => $request->price,
                'status' => $request->status,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'good_for' => $request->good_for,
                'how_to' => $request->how_to,
                'ingredients' => $request->ingredients,
                'images' => json_encode($fileNames),
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

        $product = Product::find($id);
        $product_name = str_replace(' ', '-', $request->name);
        $date_str = strtotime($product->created_at);
        $date = date('Ymd', $date_str);
        $slug = $date . '-' . $product_name;

        if ($validated) {
            Product::find($id)->update([
                'name' => $request->name,
                'merchant_id' => Auth::user()->merchant->id,
                'slug' => $slug,
                'price' => $request->price,
                'status' => $request->status,
                'short_description' => $request->short_description,
                'description' => $request->description,
                'good_for' => $request->good_for,
                'how_to' => $request->how_to,
                'ingredients' => $request->ingredients,
            ]);

            return redirect()->route('product.index')->with('success', 'Berhasil mengubah produk');
        } else {
            return redirect()->route('product.index')->with('error', 'Gagal mengubah produk');
        }
    }

    public function destroy($id)
    {
        Product::find($id)->delete();
        return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus');
    }
}
