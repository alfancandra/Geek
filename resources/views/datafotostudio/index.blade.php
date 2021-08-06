@extends('adminlte::page')

@section('title', 'Data Foto Studio')

@section('content_header')
    <h1></h1>
@stop

@section('content')
	<div class="row mt-2 mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Foto Studio</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('datafotostudio.create') }}"> Tambah Pelanggan</a>
            </div>
        </div>
    </div>
	<table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Nama</th>
            <th>Alamat</th>
            <th width="80px">Telp</th>
            <th width="120px">Paket</th>
            <th width="120px">Total</th>
            <th width="120px">Orang</th>
            <th width="120px">Tanggal</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($datafoto as $data)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $data->nama }}</td>
            <td>{{ $data->alamat }}</td>
            <td class="text-center">{{ $data->telp }}</td>
            <td class="text-center">{{ $data->nama_paket }}</td>
            <td>{{ $data->total }}</td>
            <td>{{ $data->orang }} Orang</td>
            <td class="text-center">{{ $data->created_at }}</td>
            <td class="text-center">
    				<a class="btn btn-danger btn-md" href="{{ route('datafotostudio/delete',$data->id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>  
            </td>
        </tr>
        @endforeach
    </table>
 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop