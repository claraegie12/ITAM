@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>List Branch</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('branch.create') }}">Tambah Branch Baru</a>
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
            <th width="280px"class="text-center">Branch</th>
            <th width="280px"class="text-center">Phone</th>
            <th width="480px"class="text-center">Alamat</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($Branches as $branch)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{ $branch->Name }}</td>
            <td>{{ $branch->Phone }}</td>
            <td>{{ $branch->Alamat }}</td>
            <td class="text-center">
                <a class="btn btn-primary btn-sm" href="{{ route('branch.edit',$branch->id) }}">Edit</a>
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