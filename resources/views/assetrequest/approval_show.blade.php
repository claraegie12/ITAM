@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Details Approval</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('assetapproval.index') }}">Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your update.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('assetapproval.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Model:</strong>
                    <input type="text" readonly name="Asset_model" class="form-control" value="{{ $AssetApproval->AssetRequest->AssetModels->Model_name}}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Jumlah:</strong>
                    <input type="text" readonly name="Qty" class="form-control" value="{{ $AssetApproval->AssetRequest->Qty}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="form-group">
                    <strong>Keterangan:</strong>
                    {{-- <input type="text" name="Jabatan" class="form-control" placeholder="Jabatan"> --}}
                    <textarea class="form-control" readonly style="height:150px"  placeholder="Notes" >{{ $AssetApproval->AssetRequest->Description }}</textarea>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Request By:</strong>
                    <input type="text" readonly class="form-control" value="{{ $AssetApproval->AssetRequest->Created_by}}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Request Date:</strong>
                    <input type="text" readonly class="form-control" value="{{ $AssetApproval->AssetRequest->Request_date}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Contract:</strong>
                    <input type="text" readonly name="Contract_id" id="Contract_id" class="form-control" value="{{ $AssetApproval->Contract->Contract_model}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Approval:</strong>
                    <input type="text" readonly name="Approval" id="Approval" class="form-control" value="{{ $AssetApproval->Approval}}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Invoice Number:</strong>
                    <input type="text" name="invoice_number" <?php if($AssetApproval->Approval != "1"){ echo "readonly"; } ?> class="form-control" value="{{ $AssetApproval->invoice_number}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="form-group">
                    <strong>Notes:</strong>
                    {{-- <input type="text" name="Jabatan" class="form-control" placeholder="Jabatan"> --}}
                    <textarea class="form-control" style="height:150px" name="Description" placeholder="Notes" >{{ $AssetApproval->Description }}</textarea>
                </div>
            </div>
            <input type="hidden" value="{{ Auth::user()->name }}" name="Approved_by">
            <input type="hidden" value="{{ $AssetApproval->flag }}" name="flag">
            <input type="hidden" value="{{ $AssetApproval->Contract->Vendor->Vendor_name }}" name="Manufactured_by">
            <input type="hidden" value="{{ $AssetApproval->id }}" name="id">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form> 
@endsection
