@extends('adminlte::page')

@section('title', 'Data Cetak')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="row mt-2 mb-3">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Data Sudah Cetak</h2>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>nama</th>
            <th>gambar</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($datacetak as $cetak)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $cetak->nama }}</td>
            <td><?php foreach (json_decode($cetak->gambar) as $gambar) { ?>
            <a href="{{url('uploads/'.$gambar)}}"><img src="{{url('uploads/'.$gambar)}}" width="150px" alt="{{$gambar}}"> <?php } ?></a></td>
            <td class="text-center">
                <form action="{{ route('datacetak.destroy',$cetak->id) }}" method="POST">
 
                    <a class="btn btn-info btn-sm" href="{{ route('datacetak.show',$cetak->id) }}">Show</a>
 
                    <a class="btn btn-primary btn-sm" href="{{ route('datacetak.edit',$cetak->id) }}">Edit</a>
 
                    @csrf
                    @method('DELETE')
 
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
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