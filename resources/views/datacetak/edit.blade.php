@extends('adminlte::page')

@section('title', 'Data Cetak')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Post</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('datacetak.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
 
    <form action="{{ route('datacetak.update',$datacetak->id) }}" method="POST">
        @csrf
        @method('PUT')
 
         <div class="row">
            <div class="col-sm-4 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong>Nama Pelanggan:</strong>
                    <input type="text" name="nama" value="{{ $datacetak->nama }}" class="form-control" placeholder="Nama">
                </div>
            </div>
            <div class="col-sm-4 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong>Gambar:</strong><br>
                    <?php foreach (json_decode($datacetak->gambar) as $gambar) { ?>
                        <a href="{{url('uploads/'.$gambar)}}"><img src="{{url('uploads/'.$gambar)}}" width="150px" alt="{{$gambar}}"></a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-sm-4 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong>Ukuran:</strong>
                    <select class="form-control" name="ukuran">
                        <option value="2R">2R</option>
                        <option value="3R">3R</option>
                        <option value="4R">4R</option>
                        <option value="5R">5R</option>
                        <option value="8R">8R</option>
                        <option value="10R">10R</option>
                        <option value="12R">12R</option>
                        <option value="16R">16R</option>
                        <option value="20R">20R</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong>Deskripsi Tambahan:</strong>
                    <textarea class="form-control" name="deskripsi">{{ $datacetak->deskripsi}}</textarea>
                </div>
            </div>
            <div class="col-sm-4 col-sm-12 col-sm-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
 
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop