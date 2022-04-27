@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>List Model</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('assetmodel.create') }}">Tambah Model Baru</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="280px"class="text-center">Nama Model</th>
            <th width="280px"class="text-center">Category</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($Models as $model)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{ $model->Model_name }}</td>
            <td>{{ $model->Model_category }}</td>
            <td class="text-center">
                <a class="btn btn-primary btn-sm" href="{{ route('assetmodel.edit',$model->id) }}">Edit</a>
                {{-- <form action="{{ route('pegawai.destroy',$pegawai->id) }}" method="POST"> --}}

                   {{-- <a class="btn btn-info btn-sm" href="{{ route('pegawai.show',$pegawai->id) }}">Details</a> --}}

                    

                    {{-- @csrf --}}
                    {{-- @method('DELETE') --}}

                    {{-- <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button> --}}
                {{-- </form> --}}
            </td>
        </tr>
        @endforeach
    </table>


@endsection