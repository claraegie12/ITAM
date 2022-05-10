@extends('template')

@section('content')
<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>Edit Vendor</h6>
            <p class="text-sm mb-0">
                
            </p>
            @if ($errors->any())
                <span class="font-weight-bold ms-1">Whoops! There were some problems with your input.</span>
                <p class="text-sm mb-0">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </p>
            @endif
        </div>
    </div>

    <form action="{{ route('vendor.update',$Vendor->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" name="Vendor_name" value="{{ $Vendor->Vendor_name }}" class="form-control" placeholder="Nama">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telephone:</strong>
                <input type="text" name="Vendor_phone" value="{{ $Vendor->Vendor_phone }}" class="form-control" placeholder="089xxxxxx">
                {{-- <textarea class="form-control" style="height:150px" name="Alamat" placeholder="Content">{{ $pegawai->Jabatan }}</textarea> --}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Alamat:</strong>
                {{-- <input type="text" name="Jabatan" value="{{ $Vendor->Jabatan }}" class="form-control" placeholder="Jabatan"> --}}
                <textarea class="form-control" style="height:150px" name="Vendor_address" placeholder="Content">{{ $Vendor->Vendor_address }}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Bank:</strong>
                <input type="text" name="Vendor_bank_acc" value="{{ $Vendor->Vendor_bank_acc }}" class="form-control" placeholder="Bank">
                {{-- <textarea class="form-control" style="height:150px" name="Alamat" placeholder="Content">{{ $pegawai->Jabatan }}</textarea> --}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nomor Rekening:</strong>
                <input type="text" name="Vendor_account" value="{{ $Vendor->Vendor_account }}" class="form-control" placeholder="No Rekening">
                {{-- <textarea class="form-control" style="height:150px" name="Alamat" placeholder="Content">{{ $pegawai->Jabatan }}</textarea> --}}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-info">Update</button>
            <a class="btn btn-secondary" href="{{ route('vendor.index') }}">Back</a>
        </div>
    </div>

    </form>
</div>
@endsection
