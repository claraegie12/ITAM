@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>List Pegawai</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('pegawai.create') }}">Tambah Pegawai Baru</a>
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
            <th>NIK</th>
            <th width="280px"class="text-center">Nama</th>
            <th width="280px"class="text-center">Jabatan</th>
            <th width="280px"class="text-center">Tanggal Bergabung</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($pegawais as $pegawai)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{ $pegawai->NIK_pegawai }}</td>
            <td>{{ $pegawai->Name }}</td>
            <td>{{ $pegawai->Jabatan }}</td>
            <td>{{ $pegawai->Join_date }}</td>
            <td class="text-center">
                <form action="{{ route('pegawai.destroy',$pegawai->id) }}" method="POST">

                   <a class="btn btn-info btn-sm" href="{{ route('pegawai.show',$pegawai->id) }}">Details</a>

                    <a class="btn btn-primary btn-sm" href="{{ route('pegawai.edit',$pegawai->id) }}">Edit</a>

                    {{-- @csrf --}}
                    {{-- @method('DELETE') --}}

                    {{-- <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button> --}}
                </form>
            </td>
        </tr>
        @endforeach
    </table>


@endsection