@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Create Request Disposal</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('disposal.index') }}"> Kembali</a>
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

<form action="{{ route('disposal.update',$Disposal->id) }}" method="POST">
    @csrf
    @method('PUT') 

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
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Resale Price:</strong>
                <input type="text" name="Resale_price" class="form-control" value="{{ $Disposal->Resale_price }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" >
            <div class="form-group">
                <strong>Notes:</strong>
                <textarea class="form-control" style="height:150px" name="Disposal_reason" placeholder="Notes">{{ $Disposal->Disposal_reason }}</textarea>
            </div>
        </div>
        <input type="hidden" value="{{ Auth::user()->name }}" name="Disposal_by"> 
        <input type="hidden" value="{{ $Disposal->Asset->id }}" name="Asset_id"> 
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>

@endsection