<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //menampilkan semua data dari model Siswa
        $barang = Barang::all();
        return view('toko.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('toko.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'nama_pembeli' => 'required',
            'tgl_pembelian' => 'required',
            'nama_barang' => 'required',
            'harga_satuan' => 'required',
            'jumlah_barang' => 'required',
        ]);

        $barang = new Barang();
        $barang->nama_pembeli = $request->nama_pembeli;
        $barang->tgl_pembelian = $request->tgl_pembelian;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_satuan = $request->harga_satuan;
        $barang->jumlah_barang = $request->jumlah_barang;
        $barang->total_harga = $barang->jumlah_barang * $barang->harga_satuan;
        $barang->save();
        return redirect()->route('toko.index')->with('success', 'Data berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('toko.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('toko.edit', compact('barang'));

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
        // Validasi
        $validated = $request->validate([
            'nama_pembeli' => 'required',
            'tgl_pembelian' => 'required',
            'nama_barang' => 'required',
            'harga_satuan' => 'required',
            'jumlah_barang' => 'required',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->nama_pembeli = $request->nama_pembeli;
        $barang->tgl_pembelian = $request->tgl_pembelian;
        $barang->nama_barang = $request->nama_barang;
        $barang->harga_satuan = $request->harga_satuan;
        $barang->jumlah_barang = $request->jumlah_barang;
        $barang->total_harga = $request->total_harga;
        $barang->total_harga = $barang->jumlah_barang * $barang->harga_satuan;
        $barang->save();
        return redirect()->route('toko.index')->with('success', 'Data berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('toko.index')->with('success', 'Data berhasil dihapus!');
    }
}
