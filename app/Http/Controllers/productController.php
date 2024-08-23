<?php

namespace App\Http\Controllers;

use App\Models\color;
use App\Models\foto;
use App\Models\kategori;
use App\Models\produk;
use App\Models\size;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function index()
    {
        $data['kategoris'] = kategori::all();
        $data['produks'] = produk::with('kategori')->with('foto')->with('color')->with('size')->get();
        return view('admin.product.index')->with($data);
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'kategori_id' => 'required',
            'name' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'detail' => 'required|string',
            'images.*' => 'image', // Validasi untuk setiap gambar
        ]);

        // Buat produk baru
        $product = new produk();
        $product->kategori_id = $request['kategori_id'];
        $product->name = $request['name'];
        $product->deskripsi = $request['deskripsi'];
        $product->harga = $request['harga'];
        $product->stok = $request['stok'];
        $product->detail = $request['detail'];
        $product->save();

        // Proses dan simpan setiap gambar
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = time() . '_' . $image->getClientOriginalName();
                $image->move(public_path('img/produk'), $imageName);
                $photo = new foto();
                $photo->produk_id = $product->id;
                $photo->img = $imageName;
                $photo->save();
            }
        }

        return redirect('produk')->with('success', 'Produk berhasil ditambahkan!');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'kategori_id' => 'required',
            'name' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'detail' => 'required|string',
        ]);

        $product = produk::find($id);
        $product->update($request->all());
        return redirect('produk')->with('success', 'Produk berhasil diubah');
    }

    public function delete($id){
        $photos = foto::where('produk_id', $id)->get();
        foreach ($photos as $photo) {
            $path = public_path('img/produk/' . $photo->img);
            if (file_exists($path)) {
                unlink($path);
            }
        }
        foto::where('produk_id', $id)->delete();
        produk::find($id)->delete();
        return redirect('produk')->with('success', 'Produk Berhasil di Hapus');
    }

    public function color(Request $request){
        $request->validate([
            'color' => 'required',
            'code' => 'required',
        ]);
        color::create($request->all());
        return redirect('produk')->with('success', 'berhasil menambahkan warna');
    }

    public function size(Request $request){
        $request->validate([
            'ukuran' => 'required',
        ]);
        size::create($request->all());
        return redirect('produk')->with('success', 'bereah menambahkan ukuran');
    }
}
