@extends('adminlte::page')

@section('title', 'Edit Data Paket Foto Studio')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Paket Studio</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('datapaketstudio.index') }}"> Back</a>
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
 
    <form action="{{ route('datapaketstudio.update',$datapaketstudio->id) }}" method="POST">
        @csrf
        @method('PUT')
 
        <div class="row">
            <div class="col-sm-4 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <input type="text" name="nama_paket" value="{{ $datapaketstudio->nama_paket }}" class="form-control" placeholder="Nama Paket">
                </div>
            </div>
            <div class="col-sm-4 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong>Harga:</strong>
                    <input type="number" name="harga" value="{{ $datapaketstudio->harga }}" class="form-control" placeholder="Harga">
                </div>
            </div>
            <div class="col-sm-4 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong>Jumlah Orang:</strong>
                    <input type="number" name="orang" value="{{ $datapaketstudio->orang }}" class="form-control" placeholder="Jumlah orang">
                </div>
            </div>
            <div class="col-sm-4 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong>Tambahan:</strong>
                    <input type="number" name="tambahan" value="{{ $datapaketstudio->tambahan }}" class="form-control" placeholder="Harga tambahan untuk 1 orang">
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