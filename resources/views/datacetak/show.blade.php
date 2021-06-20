@extends('adminlte::page')

@section('title', 'Data Cetak')

@section('content_header')
    <h1></h1>
@stop

@section('content')
    <div class="row mt-2 mb-2">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Show Post</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('datacetak.index') }}"> Back</a>
            </div>
        </div>
    </div>
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                {{ $datacetak->nama }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gambar:</strong>
                {{ $datacetak->gambar }}
            </div>
        </div>
    </div>
@stop
