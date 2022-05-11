@extends('template')

@section('content')

<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-12 col-12">
            <h4>Asset Procurement</h4>
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">PO Number</span> : {{ $AssetApproval->PO_number }}
            </p>
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">DO Number</span> : {{ $AssetApproval->DO_number }}
            </p>
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Invoice</span> : {{ $AssetApproval->invoice_number }}
            </p>
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Request Name</span> : {{ $AssetApproval->AssetRequest->name }}
            </p>
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Request By</span> : {{ $AssetApproval->request_by }}
            </p>
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Approval Date</span> : {{ $AssetApproval->Approval_date }}
            </p>
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Approved By</span> : {{ $AssetApproval->Approved_by }}
            </p>
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Method</span> : {{ $AssetApproval->Contract->Aquisition_method }}
            </p>
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Vendor</span> : {{ $AssetApproval->Contract->Vendor->Vendor_name }}
            </p>
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Request Description</span> : 
                
                <br>Request : {{ $AssetApproval->Description }}
                <br>IT notes : {{ $AssetApproval->AssetRequest->Description }}
            </p>
        </div>
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
                    <th>Quantity to buy</th>
                </tr>
                </thead>    
                <tbody>
                
                @foreach ($AssetApproval->Items as $Item)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{ $Item->itemrequest->AssetModels->Model_category }} - {{ $Item->itemrequest->AssetModels->Model_name }}</td>
                        <td class="text-center">{{ $Item->itemrequest->Qty }}</td>
                        <td class="text-center">{{ count($Item->itemrequest->AssetModels->Assets) }}</td>
                        <td class="text-center">{{ $Item->Qty }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            @if ($AssetApproval->flag_prucurement == "0")
            <a class="btn btn-info" href="{{ route('procurement.edit',$AssetApproval->id) }}"> Create Procurement</a>
            @endif
            <a class="btn btn-secondary" href="{{ route('procurement.index') }}"> Back</a>
        </div>
    </div>

</div>

@endsection