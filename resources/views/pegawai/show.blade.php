@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2> Show Pegawai</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('pegawai.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <td> <strong>NIK:</strong> </td>
            <td> {{ $pegawai->NIK_pegawai }} </td>
        </tr>
        <tr>
            <td> <strong>Nama Pegawai:</strong> </td>
            <td> {{ $pegawai->Name }} </td>
        </tr>
        <tr>
            <td> <strong>Jabatan:</strong> </td>
            <td> {{ $pegawai->Jabatan }} </td>
        </tr>
        <tr>
            <td> <strong>Branch:</strong> </td>
            <td> {{ $pegawai->Branches->Name }} </td>
        </tr>
        <tr>
            <td> <strong>Tanggal Bergabung:</strong> </td>
            <td> {{ $pegawai->Join_date }} </td>
        </tr>
    </table>
@endsection