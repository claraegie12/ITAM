@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Details Asset</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('assethandover.index') }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('assethandover.destroy',$Asset->AssetHandover->id) }}" method="POST">
        @csrf
        @method('DELETE') 

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Model:</strong>
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
                    <strong>Power:</strong>
                    <input type="text" readonly class="form-control" value="{{ $Asset->Power }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pegawai :</strong>
                    <input type="text" readonly class="form-control" value="{{ $Asset->AssetHandover->pegawai->Name }}">
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Handover Date:</strong>
                    <input type="text" readonly class="form-control" value="{{ $Asset->AssetHandover->Handover_date }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="form-group">
                    <strong>Notes:</strong>
                    <textarea class="form-control" readonly style="height:150px" name="Handover_notes" placeholder="Notes">{{ $Asset->AssetHandover->Handover_notes }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-warning">Withdraw</button>
            </div>
        </div>

    </form> 
@endsection
