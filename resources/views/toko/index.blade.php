
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-14">
                @include('layouts/_flash')
                <div class="card">
                    <div class="card-header">
                        Data Barang
                        <a href="{{ route('toko.create') }}" class="btn btn-sm btn-primary" style="float: right">
                            Tambah Data
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pembeli</th>
                                        <th>Tanggal Pembelian</th>
                                        <th>Nama Barang</th>
                                        <th>Harga Satuan</th>
                                        <th>Jumlah Barang</th>
                                        <th>Total Harga</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($barang as $data)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $data->nama_pembeli }}</td>
                                            <td>{{ date('d M Y', strtotime($data->tgl_pembelian)) }}</td>
                                            <td>{{ $data->nama_barang }}</td>
                                            <td>{{ number_format($data->harga_satuan,0,",",".") }}</td>
                                            <td>{{ number_format($data->jumlah_barang) }}</td>
                                            <td>{{ number_format($data->total_harga,0,",",".") }}</td>
                                            <td>
                                                <form action="{{ route('toko.destroy', $data->id) }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{ route('toko.edit', $data->id) }}"
                                                        class="btn btn-sm btn-outline-success">
                                                        Edit
                                                    </a> |
                                                    <a href="{{ route('toko.show', $data->id) }}"
                                                        class="btn btn-sm btn-outline-warning">
                                                        Show
                                                    </a> |
                                                    <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Apakah Anda Yakin?')">Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection