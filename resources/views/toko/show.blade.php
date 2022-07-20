@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Barang
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">Nama Pembeli</label>
                            <input type="text" class="form-control " name="nama_pembeli" value="{{ $barang->nama_pembeli }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Pembelian</label>
                            <input type="date" class="form-control " name="tgl_pembelian" value="{{ $barang->tgl_pembelian }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nama Barang</label>
                            <input type="text" class="form-control " name="nama_barang" value="{{ $barang->nama_barang }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga Satuan</label>
                            <input type="number" class="form-control " name="harga_satuan" value="{{ number_format($barang->harga_satuan,0,",",".") }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jumlah Barang</label>
                            <input type="number" class="form-control" name="jumlah_barang" value="{{ $barang->jumlah_barang }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Total Harga</label>
                            <input type="number" class="form-control" name="total_harga" value="{{ number_format($barang->total_harga,0,",",".") }}"
                                readonly>
                        </div>
                        <div class="mb-3">
                            <div class="d-grid gap-2">
                                <a href="{{ route('toko.index') }}" class="btn btn-primary" type="submit">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection