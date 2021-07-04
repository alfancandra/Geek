@extends('adminlte::page')

@section('title', 'Data Paket Foto Studio')

@section('content_header')
    <h1></h1>
@stop

@section('content')
	<div class="row mt-2 mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Paket Foto Studio</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('datapaketstudio.create') }}"> Tambah Paket</a>
            </div>
        </div>
    </div>
	<table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Nama</th>
            <th>Harga</th>
            <th width="80px">Orang</th>
            <th width="80px">Biaya Tambahan</th>
            <th width="120px">Tanggal</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($datapaket as $data)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $data->nama_paket }}</td>
            <td>{{ $data->harga }}</td>
            <td class="text-center">{{ $data->orang }}</td>
            <td class="text-center">{{ $data->tambahan }}</td>
            <td class="text-center">{{ $data->created_at }}</td>
            <td class="text-center">
                	<a class="btn btn-primary btn-md" href="{{ route('datapaketstudio.edit',$data->id) }}">Edit</a> | 
    				<a class="btn btn-danger btn-md" href="{{ route('datapaketstudio/delete',$data->id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>  
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