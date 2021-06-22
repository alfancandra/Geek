@extends('adminlte::page')

@section('title', 'Data Cetak')

@section('content_header')
    <h1></h1>
@stop

@section('content')
	<div class="row mt-2 mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Belum Cetak</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('datacetak.create') }}"> Create Post</a>
            </div>
        </div>
    </div>
	<table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>nama</th>
            <th>gambar</th>
            <th width="80px">Ukuran</th>
            <th>Deskripsi</th>
            <th width="120px">Tanggal Upload</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($datacetak as $cetak)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $cetak->nama }}</td>
            <td><?php foreach (json_decode($cetak->gambar) as $gambar) { ?>
            <a href="{{url('uploads/'.$gambar)}}"><img src="{{url('uploads/'.$gambar)}}" width="150px" alt="{{$gambar}}"> <?php } ?></a></td>
            <td class="text-center">{{ $cetak->ukuran }}</td>
            <td class="text-center">{{ $cetak->deskripsi }}</td>
            <td class="text-center">{{ $cetak->created_at }}</td>
            <td class="text-center">
                
                <form action="{{ route('tercetak',$cetak->id) }}" method="POST">
                	{{ csrf_field() }}
    				{{ method_field('PATCH') }}
    				
                	<button type="submit" class="btn btn-success btn-md" onclick="return confirm('Apakah Anda yakin?')">Sudah Cetak</button>
                	<a class="btn btn-primary btn-sm" href="{{ route('datacetak.edit',$cetak->id) }}">Edit</a>
    				<a class="btn btn-danger btn-sm" href="{{ route('datacetak/delete',$cetak->id) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                </form>
 
                    
 
                    
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