@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Update Approval</h2>
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

    <form action="{{ route('assetapproval.update',$AssetApproval->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Model:</strong>
                    <input type="text" disabled class="form-control" value="{{ $AssetApproval->AssetRequest->AssetModels->Model_name}}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Jumlah:</strong>
                    <input type="text" disabled class="form-control" value="{{ $AssetApproval->AssetRequest->Qty}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="form-group">
                    <strong>Keterangan:</strong>
                    {{-- <input type="text" name="Jabatan" class="form-control" placeholder="Jabatan"> --}}
                    <textarea class="form-control" disabled style="height:150px"  placeholder="Notes" >{{ $AssetApproval->AssetRequest->Description }}</textarea>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Request By:</strong>
                    <input type="text" disabled class="form-control" value="{{ $AssetApproval->AssetRequest->Created_by}}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Request Date:</strong>
                    <input type="text" disabled class="form-control" value="{{ $AssetApproval->AssetRequest->Request_date}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Contract:</strong>
                    <select class="form-control" name="Contract_id" id="Contract_id">
                        <option value = "0">Pilih Contract</option>
                        @foreach ($Contracts as $Contract)
                        <option 
                        <?php if ($Contract->id == $AssetApproval->Contract_id) echo "selected=selected" ?> value="{{ $Contract->id }}">{{ $Contract->Contract_model }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Approval:</strong>
                    <select class="form-control" name="Approval" id="Approval">
                        <option <?php if ($AssetApproval->Approval == "0") echo "selected=selected" ?> value = "0">Waiting Approval</option>
                        <option <?php if ($AssetApproval->Approval == "1") echo "selected=selected" ?> value = "1">Approved</option>
                        <option <?php if ($AssetApproval->Approval == "2") echo "selected=selected" ?> value = "2">Rejected</option>
                    </select>
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
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form> 
@endsection
