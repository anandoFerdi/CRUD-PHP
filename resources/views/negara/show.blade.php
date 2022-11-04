@extends('negara.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2>Lihat Daftar Negara</h2>
            </div>
            <div>
                <a class="btn btn-primary" href="{{ route('negara.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Gambar:</strong>
                <img src="{{ Storage::url('public/negara/').$negara->image }}" class="rounded" style="width: 150px">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                {{ $negara->nama }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Benua:</strong>
                {{ $negara->benua }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Presiden:</strong>
                {{ $negara->presiden }}
            </div>
        </div>

    </div>
@endsection
