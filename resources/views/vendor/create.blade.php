@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah Vendor Baru</h2>
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

<form action="{{ route('vendor.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="Vendor_name" class="form-control" placeholder="Nama Vendor">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telephone:</strong>
                <input type="text" name="Vendor_phone" class="form-control" placeholder="Telephone">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" >
            <div class="form-group">
                <strong>Alamat:</strong>
                {{-- <input type="text" name="Jabatan" class="form-control" placeholder="Jabatan"> --}}
                <textarea class="form-control" style="height:150px" name="Vendor_address" placeholder="Alamat"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bank:</strong>  
                <input type="text" name="Vendor_bank_acc" class="form-control" placeholder="Bank">
                {{-- <textarea class="form-control" style="height:150px" name="Alamat" placeholder="Content"></textarea> --}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nomor Rekening:</strong>  
                <input type="text" name="Vendor_account" class="form-control" placeholder="Nomor Rekening">
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