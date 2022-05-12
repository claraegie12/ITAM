@extends('template')

@section('content')

<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-12 col-12">
            <h4>Create Procurement</h4>
           
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Request Name</span> : {{ $AssetRequest->name }}
            </p>
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Request Description</span> : {{ $AssetRequest->Description }}
            </p>
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Request Date</span> : {{ $AssetRequest->Request_date }}
            </p>
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Request By</span> : {{ $AssetRequest->Created_by }}
            </p>
        </div>
    </div>
       
    <div class="card-body px-0 pb-2">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Model</th>
                    <th class="text-center">Quantity</th>
                </tr>
                </thead>    
                <tbody>
                @foreach ($AssetRequest->Items as $Item)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td >{{ $Item->AssetModels->Model_category }} - {{ $Item->AssetModels->Model_name }}</td>
                        <td class="text-center">{{ $Item->Qty }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
<form action="{{ route('purchaserequest.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contract</strong>
                <select class="form-control" name="Contract_id" id="Contract_id">
                    <option>Choose Contract</option>
                    @foreach ($Contracts as $Contract)
                    <option @if(isset($AssetRequest->AssetApproval))
                        @if ($AssetRequest->AssetApproval->Contract_id)
                        selected
                        @endif
                    @endif value="{{ $Contract->id }}">{{ $Contract->Vendor->Vendor_name }} - {{ $Contract->Aquisition_method }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" >
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="Description" placeholder="Description">
                    @if(isset($AssetRequest->AssetApproval))
                        {{$AssetRequest->AssetApproval->Description}}
                    @endif
                </textarea>
            </div>
        </div>
        <input type="hidden" value="{{ $AssetRequest->id }}" name="Request_id">

        <input type="hidden" value="{{ isset($AssetRequest->AssetApproval->id) ? $AssetRequest->AssetApproval->id : 0 }}"" name="approval_id">
     
        {{-- <input type="hidden" value="0" name="Qty">  --}}
        <input type="hidden" value="{{ Auth::user()->name }}" name="request_by">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-info">Submit</button>
            <a class="btn btn-secondary" href="{{ route('purchaserequest.index') }}"> Back</a>
        </div>
    </div>
</form>
</div>

@endsection