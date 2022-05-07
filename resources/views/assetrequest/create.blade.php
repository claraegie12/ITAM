@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Buat Request Baru</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('assetrequest.index') }}"> Kembali</a>
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

<form action="{{ route('assetrequest.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Model Asset:</strong>
                <select class="form-control" name="Asset_model_id" id="Asset_model_id">
                    <option value = "0">Pilih Model</option>
                    @foreach ($AssetModels as $AssetModel)
                    <option value="{{ $AssetModel->id }}">{{ $AssetModel->Model_name }}</option>
                    @endforeach
                </select>
                {{-- <input type="text" name="Branch" class="form-control" placeholder="Cabang"> --}}
                {{-- <textarea class="form-control" style="height:150px" name="Alamat" placeholder="Content"></textarea> --}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Jumlah:</strong>
                <input type="text" name="Qty" class="form-control" placeholder="Jumlah">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" >
            <div class="form-group">
                <strong>Keterangan:</strong>
                {{-- <input type="text" name="Jabatan" class="form-control" placeholder="Jabatan"> --}}
                <textarea class="form-control" style="height:150px" name="Description" placeholder="Keterangan"></textarea>
            </div>
        </div>
        <input type="hidden" value="1" name="Asset_id">
        <input type="hidden" value="{{ Auth::user()->name }}" name="Created_by">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>

@endsection