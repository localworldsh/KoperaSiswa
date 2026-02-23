<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::latest()->get();
        return view('landing', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('show', compact('product'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fullName'    => 'required|string|max:255',
            'class'       => 'required|string|max:50',
            'phone'       => 'required|string|max:20',
            'productName' => 'required|string|max:255',
            'price'       => 'required|numeric',
            'category'    => 'required',
            'description' => 'required|string',
            'image'       => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            // Gunakan path absolut yang lebih aman
            $destinationPath = public_path('storage/products');

            // Jika folder belum ada, buat secara manual dengan izin penuh
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            
            // Pindahkan file
            $request->image->move($destinationPath, $imageName);
        }

        Product::create([
            'seller_name'  => $request->fullName,
            'seller_class' => $request->class,
            'phone'        => $request->phone,
            'product_name' => $request->productName,
            'category'     => $request->category,
            'price'        => $request->price,
            'description'  => $request->description,
            'image'        => $imageName,
        ]);

        // Notifikasi Fonnte
        $token = env('FONNTE_TOKEN');
        $pesan = "Halo *{$request->fullName}*! 👋\n\nProduk kamu *{$request->productName}* berhasil terbit!";
        try {
            Http::withHeaders(['Authorization' => $token])
                ->post('https://api.fonnte.com/send', [
                    'target' => $request->phone,
                    'message' => $pesan,
                ]);
        } catch (\Exception $e) {}

        return redirect()->back()->with('success', 'Produk berhasil diposting!');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $request->validate([
            'fullName'    => 'required',
            'productName' => 'required',
            'price'       => 'required|numeric',
        ]);

        $imageName = $product->image;
        if ($request->hasFile('image')) {
            $destinationPath = public_path('storage/products');
            
            if (!File::exists($destinationPath)) {
                File::makeDirectory($destinationPath, 0755, true);
            }

            // Hapus foto lama jika ada
            if ($product->image && File::exists($destinationPath . '/' . $product->image)) {
                File::delete($destinationPath . '/' . $product->image);
            }

            $imageName = time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move($destinationPath, $imageName);
        }

        $product->update([
            'seller_name'  => $request->fullName,
            'seller_class' => $request->class,
            'phone'        => $request->phone,
            'product_name' => $request->productName,
            'category'     => $request->category,
            'price'        => $request->price,
            'description'  => $request->description,
            'image'        => $imageName
        ]);

        return redirect('/')->with('success', 'Produk diperbarui!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if ($product->image && File::exists(public_path('storage/products/' . $product->image))) {
            File::delete(public_path('storage/products/' . $product->image));
        }
        $product->delete();
        return redirect()->back()->with('success', 'Produk dihapus!');
    }

    public function order(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $token = env('FONNTE_TOKEN');
        $pesan = "📢 *PESANAN BARU!*\nProduk: *{$product->product_name}*\nPembeli: {$request->buyer_name}";

        try {
            Http::withHeaders(['Authorization' => $token])
                ->post('https://api.fonnte.com/send', [
                    'target' => $product->phone,
                    'message' => $pesan,
                ]);
            return redirect()->back()->with('success', 'Pesanan diteruskan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal kirim pesanan.');
        }
    }

    public function adminIndex()
{
    // Mengambil semua produk untuk ditampilkan di tabel admin
    $products = \App\Models\Product::all(); 
    
    // Mengarahkan ke file resources/views/admin.blade.php
    return view('admin', compact('products'));
}

}