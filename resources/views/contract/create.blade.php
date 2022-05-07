@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah Contract Baru</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('vendor.index') }}"> Kembali</a>
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

<form action="{{ route('contract.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vendor:</strong>
                <select class="form-control" name="Vendor_id" id="Vendor_id">
                    <option value = "0">Pilih Vendor</option>
                    @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->id }}">{{ $vendor->Vendor_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contract Model:</strong>
                <select class="form-control" name="Contract_model" id="Contract_model">
                    <option value = "0">Pilih Model</option>
                    <option value = "Model 1">Model 1</option>
                    <option value = "Model 2">Model 2</option>
                    <option value = "Model 3">Model 3</option>
                    {{-- @foreach ($vendors as $vendor) --}}
                    {{-- <option value="{{ $vendor->id }}">{{ $vendor->Vendor_name }}</option> --}}
                    {{-- @endforeach --}}
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Aquisition Method:</strong>
                <select class="form-control" name="Aquisition_method" id="Aquisition_method">
                    <option value = "0">Pilih Metode</option>
                    <option value = "Metode 1">Metode 1</option>
                    <option value = "Metode 2">Metode 2</option>
                    <option value = "Metode 3">Metode 3</option>
                    {{-- @foreach ($vendors as $vendor) --}}
                    {{-- <option value="{{ $vendor->id }}">{{ $vendor->Vendor_name }}</option> --}}
                    {{-- @endforeach --}}
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Expendiature Type:</strong>
                <select class="form-control" name="Expendiature_type" id="Expendiature_type">
                    <option value = "0">Pilih Type</option>
                    <option value = "Type 1">Type 1</option>
                    <option value = "Type 2">Type 2</option>
                    <option value = "Type 3">Type 3</option>
                    {{-- @foreach ($vendors as $vendor) --}}
                    {{-- <option value="{{ $vendor->id }}">{{ $vendor->Vendor_name }}</option> --}}
                    {{-- @endforeach --}}
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cost:</strong>
                <input type="text" name="Cost" class="form-control" placeholder="Cost">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cost Currently:</strong>
                <input type="text" name="Cost_currently" class="form-control" placeholder="Cost Currently">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cost Center:</strong>
                <input type="text" name="Cost_center" class="form-control" placeholder="Cost Center">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Member Firm:</strong>
                <input type="text" name="Member_firm" class="form-control" placeholder="Member Firm">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" >
            <div class="form-group">
                <strong>Notes:</strong>
                {{-- <input type="text" name="Jabatan" class="form-control" placeholder="Jabatan"> --}}
                <textarea class="form-control" style="height:150px" name="Description" placeholder="Notes"></textarea>
            </div>
        </div>

        <input type="hidden" value="{{ Auth::user()->name }}" name="Created_by">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>

@endsection