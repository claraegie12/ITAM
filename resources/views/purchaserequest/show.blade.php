@extends('template')

@section('content')

<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>Add Item to Procurement</h6>
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
            @if ($message = Session::get('succes'))
            <p class="text-sm mb-0">
                <i class="fa fa-check text-info" aria-hidden="true"></i>
                <span class="font-weight-bold ms-1">{{ $message }}</span> 
            </p>
            @endif
        </div>
    </div>


    <div class="row">
        <form action="{{ route('purchaserequest.update',$AssetApproval->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-lg-12 col-12">
                <p class="text-ml mb-0">
                    <span class="font-weight-bold ms-1">Request Name</span> : {{ $AssetApproval->AssetRequest->name }}
                </p>
                <p class="text-ml mb-0">
                    <span class="font-weight-bold ms-1">Request Description</span> : {{ $AssetApproval->AssetRequest->Description }}
                </p>
                <p class="text-ml mb-0">
                    <span class="font-weight-bold ms-1">Request Date</span> : {{ $AssetApproval->AssetRequest->Request_date }}
                </p>
                <p class="text-ml mb-0">
                    <span class="font-weight-bold ms-1">Request By</span> : {{ $AssetApproval->AssetRequest->Created_by }}
                </p>
                <p class="text-ml mb-0">
                    <span class="font-weight-bold ms-1">Approval Date</span> : {{ $AssetApproval->AssetRequest->approved_date }}
                </p>
                <p class="text-ml mb-0">
                    <span class="font-weight-bold ms-1">Approved By</span> : {{ $AssetApproval->AssetRequest->approved_by }}
                </p>
                <p class="text-ml mb-0">
                    <span class="font-weight-bold ms-1">Method</span> : {{ $AssetApproval->Contract->Aquisition_method }}
                </p>

                <p class="text-ml mb-0">
                    <span class="font-weight-bold ms-1">Vendor</span> : {{ $AssetApproval->Contract->Vendor->Vendor_name }}
                </p>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure to submit this data?')">Confirm</button>
                <a class="btn btn-secondary" href="{{ route('purchaserequest.index') }}">Back</a>
            </div>
        </form>
    </div>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th>Nama Model</th>
                    <th>Requested Quantity</th>
                    <th>Stock</th>
                    <th>Quantity</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>    
                <tbody>
                
                @foreach ($AssetApproval->Items as $Item)
                    <tr>
                        <form action="{{ route('itempurchase.update',$Item->id) }}" method="POST">
                            @csrf
                            @method('PUT') 
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{ $Item->itemrequest->AssetModels->Model_category }} - {{ $Item->itemrequest->AssetModels->Model_name }}</td>
                            <td class="text-center">{{ $Item->itemrequest->Qty }}</td>
                            <td class="text-center">{{ count($Item->itemrequest->AssetModels->Assets) }}</td>
                            <td><input type="text" name="Qty" class="form-control" placeholder="Quantity" value="{{ $Item->Qty }}"></td>
                            <td class="text-center">
                                <button type="submit" class="btn btn-info btn-sm">Set</button>
                            </td>
                            <input type="hidden" value="{{$AssetApproval->id}}" name="approval_id">
                        </form>
                    </tr>
               
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


</div>

@endsection