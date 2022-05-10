@extends('template')

@section('content')
    <div class="card-header pb-0">
        <div class="row">
        <div class="col-lg-6 col-7">
            <h6>List Headcount</h6>
            <p class="text-sm mb-0">
            <a class="btn btn-success" href="{{ route('pegawai.create') }}">Add New Headcount</a>
            </p>
            @if ($message = Session::get('succes'))
            <p class="text-sm mb-0">
                <i class="fa fa-check text-info" aria-hidden="true"></i>
                <span class="font-weight-bold ms-1">{{ $message }}</span> 
            </p>
            @endif
        </div>
    </div>

    <div class="card-body px-0 pb-2">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">NIK</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Jabatan</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tanggal Bergabung</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($pegawais as $pegawai)
                
                <tr>
                    <td class="text-center">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$loop->iteration}}</h6>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">
                            <a href="{{ route('pegawai.show',$pegawai->id) }}">{{ $pegawai->NIK_pegawai }}</a>
                            </h6>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $pegawai->Name }}</h6>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $pegawai->Jabatan }}</h6>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $pegawai->Join_date }}</h6>
                        </div>
                    </td>
                    <td class="text-center">
                        <form action="{{ route('pegawai.destroy',$pegawai->id) }}" method="POST">
                            <a class="btn btn-info btn-sm" href="{{ route('pegawai.edit',$pegawai->id) }}">Edit</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to change this data?')">Resign</button>
                        </form>
                    </td>
                </tr>
                
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection