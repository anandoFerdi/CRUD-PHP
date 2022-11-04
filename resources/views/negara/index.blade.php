@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Daftar Negara') }}</div>

                <div class="card-body">
                    {{-- <div class="row mt-5"> --}}
                        <div class="col-lg-12 margin-tb">
                            {{-- <div class="float-start">
                                <h2>Daftar Negara</h2>
                            </div> --}}
                            <div class="float-end">
                                <a class="btn btn-success" href="{{ route('negara.create') }}"> Tambah Daftar Negara</a>
                            </div>
                        </div>
                    {{-- </div> --}}

                    <table class="table table-bordered">
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Benua</th>
                            <th>Presiden</th>
                            <th width="280px">Action</th>
                        </tr>
                        @foreach ($negara as $ne)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>
                                <img src="{{ Storage::url('public/negara/').$ne->image }}" class="rounded" style="width: 150px">
                            </td>
                            <td>{{ $ne->nama }}</td>
                            <td>{{ $ne->benua }}</td>
                            <td>{{ $ne->presiden }}</td>
                            <td>
                                <form action="{{ route('negara.destroy',$ne->id) }}" method="POST">

                                    <a class="btn btn-info" href="{{ route('negara.show',$ne->id) }}">Show</a>

                                    <a class="btn btn-primary" href="{{ route('negara.edit',$ne->id) }}">Edit</a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <div class="row text-center">
        {!! $negara->links() !!}
    </div>

@endsection
