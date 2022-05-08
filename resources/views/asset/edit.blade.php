@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Details Asset</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('asset.index') }}">Back</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="form-group">
            <strong>Model:</strong>
            <input type="text" name="Model" readonly class="form-control" value="{{ $Item->asset_model_id}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="form-group">
            <strong>Power:</strong>
            <input type="text" name="Power" readonly class="form-control" value="{{ $Item->Power}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="form-group">
            <strong>Height:</strong>
            <input type="text" name="Height" readonly class="form-control" value="{{ $Item->Height}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="form-group">
            <strong>Width:</strong>
            <input type="text" name="Width" readonly class="form-control" value="{{ $Item->Width}}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="form-group">
            <strong>Vendor:</strong>
            <input type="text" name="invoice_number" readonly class="form-control" value="{{ $Item->Manufactured_by}}">
        </div>
    </div>
    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="280px" class="text-center">Serial Number</th>
            <th width="280px" class="text-center">Status</th>
        </tr>
        @foreach ($Assets as $Asset)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{ $Asset->Serial_number }}</td>
            <td>{{ $Asset->Jenis_asset }}</td>
        </tr>
        @endforeach
    </table>


@endsection