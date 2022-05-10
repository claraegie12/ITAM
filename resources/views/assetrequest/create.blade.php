@extends('template')

@section('content')

<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>Add New Request Asset</h6>
            <p class="text-sm mb-0"></p>
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

<form action="{{ route('assetrequest.store') }}" method="POST">
    @csrf

     <div class="row">
        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Model Asset:</strong>
                <select class="form-control" name="Asset_model_id" id="Asset_model_id">
                    <option value = "0">Pilih Model</option>
                    @foreach ($AssetModels as $AssetModel)
                    <option value="{{ $AssetModel->id }}">{{ $AssetModel->Model_name }}</option>
                    @endforeach
                </select>
            </div>
        </div> --}}
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Request Name</strong>
                <input type="text" name="name" class="form-control" placeholder="Request Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" >
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="Description" placeholder="Description"></textarea>
            </div>
        </div>
        <input type="hidden" value="0" name="Asset_id">
        <input type="hidden" value="0" name="Asset_model_id">
        <input type="hidden" value="0" name="Qty">
        <input type="hidden" value="{{ Auth::user()->name }}" name="Created_by">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-info">Submit</button>
            <a class="btn btn-secondary" href="{{ route('assetrequest.index') }}"> Back</a>
        </div>
    </div>

</form>
</div>

@endsection