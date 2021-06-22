@extends('adminlte::page')

@section('title', 'Data Bingkai')

@section('content_header')
    <h1></h1>
@stop

@section('content')
	<div class="row mt-2 mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Bingkai</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('databingkai.create') }}"> Create Post</a>
            </div>
        </div>
    </div>
	<table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>nama</th>
            <th>jenis</th>
            <th width="80px">Ukuran</th>
            <th width="120px">harga beli</th>
            <th width="120px">harga jual</th>
            <th width="80px">stock</th>
            <th width="120px">Tanggal Upload</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($databingkai as $bingkai)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $bingkai->nama }}</td>
            <td>{{ $bingkai->jenis }}</td>
            <td class="text-center">{{ $bingkai->ukuran }}</td>
            <td class="text-center">{{ $bingkai->harga_beli }}</td>
            <td class="text-center">{{ $bingkai->harga_jual }}</td>
            <td class="text-center">{{ $bingkai->stock }}</td>
            <td class="text-center">{{ $bingkai->created_at }}</td>
            <td class="text-center">
                	<a class="btn btn-primary btn-md" href="{{ route('datacetak.edit',$bingkai->id) }}">Edit</a> | 
    				<a class="btn btn-danger btn-md" href="{{ route('datacetak/delete',$bingkai->id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>  
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