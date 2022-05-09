@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Disposal Request Details</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('disposalrequest.index') }}"> Kembali</a>
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


<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Asset:</strong>
        <input type="text" readonly class="form-control" value="{{ $Disposal->Asset->asset_model_id }}">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Serial Number:</strong>
        <input type="text" readonly class="form-control" value="{{ $Disposal->Asset->Serial_number }}">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Installed Date:</strong>
        <input type="text" readonly class="form-control" value="{{ $Disposal->Asset->Install_date }}">
    </div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
        <strong>Request Disposal Date:</strong>
        <input type="text" readonly class="form-control" value="{{ $Disposal->Disposal_date }}">
    </div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
        <strong>Request Disposal by:</strong>
        <input type="text" readonly class="form-control" value="{{ $Disposal->Disposal_by }}">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <strong>Status Disposal:</strong>
        <input type="text" readonly class="form-control" value="{{ $Disposal->Approval }}">
    </div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
        <strong>Approve Date:</strong>
        <input type="text" readonly class="form-control" value="{{ $Disposal->Approval_date }}">
    </div>
</div>
<div class="col-xs-6 col-sm-6 col-md-6">
    <div class="form-group">
        <strong>Approved by:</strong>
        <input type="text" readonly class="form-control" value="{{ $Disposal->Approval_by }}">
    </div>
</div>
<div class="col-xs-12 col-sm-12 col-md-12" >
    <div class="form-group">
        <strong>Notes:</strong>
        <textarea readonly class="form-control" style="height:150px" name="Notes" placeholder="Notes">{{ $Disposal->Notes }}</textarea>
    </div>
</div>

</div>



@endsection