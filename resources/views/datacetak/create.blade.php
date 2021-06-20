@extends('adminlte::page')

@section('title', 'Data Cetak')

@section('content_header')
    <h1></h1>
@stop

@section('content')
<div class="row mt-2 mb-2">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah Cetakan</h2>
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
 
<form action="{{ route('datacetak.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
 
     <div class="row">
        <div class="col-sm-4 col-sm-12 col-sm-12">
            <div class="form-group">
                <strong>Nama Pelanggan:</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama">
            </div>
        </div>
        <div class="col-sm-4 col-sm-12 col-sm-12">
            <div class="form-group">
                <strong>Gambar:</strong>
                <input type="file" name="gambar[]" multiple="multiple" class="form-control" placeholder="Gambar">
            </div>
        </div>
        <div class="col-sm-4 col-sm-12 col-sm-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
 
</form>
@endsection