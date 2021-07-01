@extends('adminlte::page')

@section('title', 'Data Foto Studio')

@section('content_header')
    <h1></h1>
@stop

@section('content')
<div class="row mt-2 mb-2">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah Pelanggan</h2>
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
 
<form action="{{ route('datafotostudio.store') }}" method="POST">
    @csrf
 
     <div class="row">
        <div class="col-sm-4 col-sm-12 col-sm-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="nama" class="form-control" placeholder="Nama">
            </div>
        </div>
        <div class="col-sm-4 col-sm-12 col-sm-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                <input type="text" name="alamat" class="form-control" placeholder="Alamat">
            </div>
        </div>
        <div class="col-sm-4 col-sm-12 col-sm-12">
            <div class="form-group">
                <strong>Nomor Telp:</strong>
                <input type="number" name="telp" class="form-control" placeholder="Nomor telp">
            </div>
        </div>
        <div class="col-sm-4 col-sm-12 col-sm-12">
            <div class="form-group">
                <strong>Paket:</strong>
                <select class="form-control" name="paket">
                @foreach ($datapaket as $data)
                    <option value="{{ $data->id }}">{{ $data->nama_paket }}</option>
                @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4 col-sm-12 col-sm-12">
            <div class="form-group">
                <strong>Jumlah Orang:</strong>
                <input type="number" name="orang" class="form-control" placeholder="Jumlah orang">
            </div>
        </div>
        <div class="col-sm-4 col-sm-12 col-sm-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
 
</form>
@endsection