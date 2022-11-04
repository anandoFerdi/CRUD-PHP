@extends('negara.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div>
                <h2>Edit Daftar Negara</h2>
            </div>
            <div>
                <a class="btn btn-primary" href="{{ route('negara.index') }}"> Back</a>
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

    <form action="{{ route('negara.update',$negara->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama:</strong>
                    <br>
                    <input type="text" name="nama" value="{{ $negara->nama }}" class="form-control" placeholder="Nama">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Benua:</strong>
                    <br>
                    <input class="form-control" name="benua" placeholder="Benua" value="{{ $negara->benua }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Presiden:</strong>
                    <br>
                    <input class="form-control" name="presiden" placeholder="Presiden" value="{{ $negara->presiden }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label class="font-weight-bold">Gambar</label>
                    <br>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" value="{{ $negara->presiden }}">

                </div>
            </div>
            <br>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
              <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </div>

    </form>
@endsection
