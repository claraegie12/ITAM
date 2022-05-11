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
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Idle</strong>
                <input type="text" name="Height" readonly class="form-control" value="{{ isset($Model->Assets_idle) ? count($Model->Assets_idle) : '0'}}">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Ready</strong>
                <input type="text" name="Height" readonly class="form-control" value="{{ isset($Model->Assets_ready) ? count($Model->Assets_ready) : '0'}}">
            </div>
        </div>
        
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Owned</strong>
                <input type="text" name="Height" readonly class="form-control" value="{{ isset($Model->Assets_own) ? count($Model->Assets_own) : '0'}}">
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Broke</strong>
                <input type="text" name="Height" readonly class="form-control" value="{{ isset($Model->Assets_broke) ? count($Model->Assets_broke) : '0'}}">
            </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>On Service</strong>
                <input type="text" name="Height" readonly class="form-control" value="{{ isset($Model->Assets_service) ? count($Model->Assets_service) : '0'}}">
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
                    <th>Exp. Warranty</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
                @foreach ($Models as $Asset)
                <tr>
                    @if ($Asset->Jenis_asset == "Idle")
                    <form action="{{ route('asset.update',$Asset->id) }}" method="POST">
                        @csrf
                        @method('PUT') 
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{ isset($Asset->AssetApproval->invoice_number) ? $Asset->AssetApproval->invoice_number : "AA"}} - {{ $Asset->id }}</td>
                            <td><input type="text" name="Serial_number" class="form-control" placeholder="Serial_number" value="{{ $Asset->Serial_number }}"></td>
                            <td>{{ isset($Asset->AssetSupport->Warranty_expired) ? $Asset->AssetSupport->Warranty_expired : ""}} </td>
                            <td>{{ $Asset->Jenis_asset }}</td>
                            <td>
                                <input type="hidden" name="asset_model_id" class="form-control" value="{{ $Asset->asset_model_id }}">
                                <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are you sure to save this data?')">Edit</button>
                            </td>
                    </form> 
                    @else
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{ isset($Asset->AssetApproval->invoice_number) ?$Asset->AssetApproval->invoice_number : "AA"}}  - {{ $Asset->id }}</td>
                        <td>{{ $Asset->Serial_number }}</td>
                        <td>{{ isset($Asset->AssetSupport->Warranty_expired) ? $Asset->AssetSupport->Warranty_expired : ""}}</td>
                        <td>{{ $Asset->Jenis_asset }}</td>
                        <td>
                        @if ($Asset->Jenis_asset == "Broke")
                            <a class="btn btn-warning" href="{{ route('assetsupport.edit',$Asset->id) }}">Service</a> 
                        @else
                            <a class="btn btn-danger" href="{{ route('assetsupport.edit',$Asset->id) }}">Broke</a>
                        @endif
                        </td>
                    @endif
                    
                </tr>
                @endforeach
            </table>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-secondary" href="{{ route('asset.index') }}">Back</a>
        </div>
    </div>
</div>


@endsection