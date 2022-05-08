@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Create Request Disposal</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('assethandover.index') }}"> Kembali</a>
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

<form action="{{ route('disposalrequest.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Asset:</strong>
                <input type="text" readonly class="form-control" value="{{ $Asset->asset_model_id }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Serial Number:</strong>
                <input type="text" readonly class="form-control" value="{{ $Asset->Serial_number }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Installed Date:</strong>
                <input type="text" readonly class="form-control" value="{{ $Asset->Install_date }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" >
            <div class="form-group">
                <strong>Notes:</strong>
                <textarea class="form-control" style="height:150px" name="Notes" placeholder="Notes"></textarea>
            </div>
        </div>
        <input type="hidden" value="{{ Auth::user()->name }}" name="Disposal_by"> 
        <input type="hidden" value="{{ $Asset->id }}" name="Asset_id"> 
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>

@endsection