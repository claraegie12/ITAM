@extends('template')

@section('content')

<div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h6>Details</h6>
                <p class="text-sm mb-0">
                    <a class="btn btn-secondary" href="{{ route('asset.index') }}">Back</a>
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
    {{-- <div class="col-xs-12 col-sm-6 col-md-12">
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
    </div> --}}
    <div class="card-body px-0 pb-2">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <tr>
                    <th class="text-center">No</th>
                    <th>Asset Code</th>
                    <th>Serial Number</th>
                    <th>Power</th>
                    <th>Height</th>
                    <th>Width</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                </tr>
                @foreach ($Model->Assets as $Asset)
                <tr>
                    @if ($Asset->Jenis_asset == "Idle")
                    <form action="{{ route('asset.update',$Asset->id) }}" method="POST">
                        @csrf
                        @method('PUT') 

                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{ $Asset->AssetApproval->invoice_number }} - {{ $Asset->id }}</td>
                            <td><input type="text" name="Serial_number" class="form-control" placeholder="Serial_number" value="{{ $Asset->Serial_number }}"></td>
                            <td><input type="text" name="Power" class="form-control" placeholder="Power" value="{{ $Asset->Power }}"></td>
                            <td><input type="text" name="Height" class="form-control" placeholder="Height" value="{{ $Asset->Height }}"></td>
                            <td><input type="text" name="Width" class="form-control" placeholder="Width" value="{{ $Asset->Width }}"></td>
                            <td>{{ $Asset->Jenis_asset }}</td>
                            <td>
                                <input type="hidden" name="asset_model_id" class="form-control" value="{{ $Asset->asset_model_id }}">
                                <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are you sure to save this data?')">Edit</button>
                            </td>
                    </form> 
                    @else
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{ $Asset->AssetApproval->invoice_number }} - {{ $Asset->id }}</td>
                        <td>{{ $Asset->Serial_number }}</td>
                        <td>{{ $Asset->Power }}</td>
                        <td>{{$Asset->Height}}</td>
                        <td>{{ $Asset->Width }}</td>
                        <td>{{ $Asset->Jenis_asset }}</td>
                        <td>
                        </td>
                    @endif
                    
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>


@endsection