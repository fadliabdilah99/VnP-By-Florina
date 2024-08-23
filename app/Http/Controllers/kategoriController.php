<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class kategoriController extends Controller
{
    public function index()
    {
        $data['kategoris'] = kategori::all();
        return view('admin.kategori.index')->with($data);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'image' => 'required',
        ]);
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('img/kategori'), $new_name);
        $form_data = array(
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'foto' => $new_name
        );
        kategori::create($form_data);
        return redirect('kategori')->with('success', 'Data Berhasil di tambahkan');
    }

    public function edit(Request $request, $id)
    {
        kategori::find($id)->update($request->all());
        return redirect('kategori')->with('success', 'Data Kategori Berhasil di Update');
    }

    public function delete($id)
    {
        // hapus semua produk berdasarkan kategori
        $data = produk::where('kategori_id', $id)->delete();

        // hapus gambar kategori
        $data = kategori::find($id);
        File::delete(public_path('img/kategori/' . $data->image));

        // hapus kategori        
        kategori::find($id)->delete();
        return redirect('kategori')->with('success', 'Data Kategori Berhasil di Hapus');
    }
}
