@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Pegawai</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('pegawai.index') }}"> Back</a>
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

    <form action="{{ route('pegawai.update',$pegawai->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>NIK Pegawai:</strong>
                <input type="text" readonly name="NIK" class="form-control" placeholder="NIK Pegawai" value="{{ $pegawai->NIK_pegawai }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="Name" value="{{ $pegawai->Name }}" class="form-control" placeholder="Nama Pegawai">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cabang:</strong>
                <select class="form-control" name="Branch" id="Branch">
                    @foreach ($branches as $branch)
                        @if($branch->id == $pegawai->Branch)
                            <option selected="selected" value="{{ $branch->id }}">{{ $branch->Name }}</option>
                        @else
                            <option value="{{ $branch->id }}">{{ $branch->Name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jabatan:</strong>
                <input type="text" name="Jabatan" value="{{ $pegawai->Jabatan }}" class="form-control" placeholder="Jabatan">
                {{-- <textarea class="form-control" style="height:150px" name="Alamat" placeholder="Content">{{ $pegawai->Jabatan }}</textarea> --}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>

    </form>
@endsection
