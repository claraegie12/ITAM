@extends('template')

@section('content')

<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>Details</h6>
            <p class="text-sm mb-0">
                
            </p>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="form-group">
            <strong>Category</strong>
            <input type="text" name="Model" readonly class="form-control" value="{{ $Model->Model_category }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="form-group">
            <strong>Model</strong>
            <input type="text" name="Power" readonly class="form-control" value="{{ $Model->Model_name}}">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Power</strong>
                <input type="text" name="Power" readonly class="form-control" value="1200">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Height</strong>
                <input type="text" name="Power" readonly class="form-control" value="800">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Width</strong>
                <input type="text" name="Power" readonly class="form-control" value="500">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total Disposal</strong>
                <input type="text" name="Height" readonly class="form-control" value="{{ isset($Model->Assets_total_disposal) ? count($Model->Assets_total_disposal) : '0'}}">
            </div>
        </div>
    </div>
    
    <div class="card-body px-0 pb-2">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <tr>
                    <th class="text-center">No</th>
                    <th>Asset Code</th>
                    <th>Serial Number</th>
                    <th>Disposal Date</th>
                    
                </tr>
                @foreach ($Models as $Asset)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{ isset($Asset->AssetApproval->invoice_number) ? $Asset->AssetApproval->invoice_number : "AA"}} - {{ $Asset->id }}</td>
                    <td>{{ $Asset->Serial_number }}</td>
                    <td>{{ $Asset->disposal_date }}</td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-secondary" href="{{ route('disposal.index') }}">Back</a>
        </div>
    </div>
</div>


@endsection