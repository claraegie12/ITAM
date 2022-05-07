@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah Pegawai Baru</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('pegawai.index') }}"> Kembali</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> Input gagal.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('pegawai.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIK:</strong>
                <input type="text" name="NIK_pegawai" class="form-control" placeholder="NIK Pegawai">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Pegawai:</strong>
                <input type="text" name="Name" class="form-control" placeholder="Nama Pegawai">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cabang:</strong>
                <select class="form-control" name="Branch" id="Branch">
                    <option value = "0">Pilih Cabang</option>
                    @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->Name }}</option>
                    @endforeach
                </select>
                {{-- <input type="text" name="Branch" class="form-control" placeholder="Cabang"> --}}
                {{-- <textarea class="form-control" style="height:150px" name="Alamat" placeholder="Content"></textarea> --}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" >
            <div class="form-group">
                <strong>Jabatan:</strong>
                <input type="text" name="Jabatan" class="form-control" placeholder="Jabatan">
                {{-- <textarea class="form-control" style="height:150px" name="Alamat" placeholder="Content"></textarea> --}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Departemen:</strong>
                <select class="form-control" name="bagian" id="bagian">
                    <option value = "0">Pilih Departemen</option>
                    @foreach ($bagians as $bagian)
                    <option value="{{ $bagian->Name }}">{{ $bagian->Name }}</option>
                    @endforeach
                </select>
                {{-- <input type="text" name="Branch" class="form-control" placeholder="Cabang"> --}}
                {{-- <textarea class="form-control" style="height:150px" name="Alamat" placeholder="Content"></textarea> --}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tanggal Bergabung:</strong>  
                <input type="text" name="Join_date" class="form-control" placeholder="Tanggal Bergabung">
                {{-- <textarea class="form-control" style="height:150px" name="Alamat" placeholder="Content"></textarea> --}}
            </div>
        </div>
        <input type="hidden" value="1900-12-31" name="Resign_date">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>

@endsection