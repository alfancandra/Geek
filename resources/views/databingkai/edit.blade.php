@extends('adminlte::page')

@section('title', 'Data Bingkai')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Bingkai</h2>
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
 
    <form action="{{ route('databingkai.update',$databingkai->id) }}" method="POST">
        @csrf
        @method('PUT')
 
         <div class="row">
            <div class="col-sm-4 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong>Nama Bingkai:</strong>
                    <input type="text" name="nama" value="{{ $databingkai->nama }}" class="form-control" placeholder="Nama">
                </div>
            </div>
            <div class="col-sm-4 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong>Jenis Bingkai:</strong>
                    <input type="text" name="jenis" value="{{ $databingkai->jenis }}" class="form-control" placeholder="Nama">
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
                    <strong>Harga Beli:</strong>
                    <input type="number" name="harga_beli" value="{{ $databingkai->harga_beli }}" class="form-control">
                </div>
            </div>
            <div class="col-sm-4 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong>Harga Jual:</strong>
                    <input type="number" name="harga_jual" value="{{ $databingkai->harga_jual }}" class="form-control">
                </div>
            </div>
            <div class="col-sm-4 col-sm-12 col-sm-12">
                <div class="form-group">
                    <strong>Stock:</strong>
                    <input type="number" name="stock" value="{{ $databingkai->stock }}" class="form-control">
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