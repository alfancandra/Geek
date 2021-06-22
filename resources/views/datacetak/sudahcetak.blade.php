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
            <th>Foto</th>
            <th>Tanggal Cetak</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($datacetak as $cetak)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $cetak->nama }}</td>
            <td><?php foreach (json_decode($cetak->gambar) as $gambar) { ?>
            <a href="{{url('uploads/'.$gambar)}}"><img src="{{url('uploads/'.$gambar)}}" width="150px" alt="{{$gambar}}"> <?php } ?></a></td>
            <td class="text-center">{{ $cetak->updated_at }}</td>
            <td class="text-center">
                <form action="{{ route('sudahcetak/back',$cetak->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('PATCH') }}
                    
                    <button type="submit" class="btn btn-danger btn-md" onclick="return confirm('Apakah Anda yakin?')">Kembalikan</button>
                
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