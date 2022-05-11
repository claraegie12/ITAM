@extends('template')

@section('content')

<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-12 col-12">
            <h4>Details Procurement</h4>
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
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Request Name</span> : {{ $AssetApproval->AssetRequest->name }}
            </p>
            
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Request By</span> : {{ $AssetApproval->request_by }}
            </p>
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Approval Date</span> : {{ $AssetApproval->created_at }}
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
        <form action="{{ route('procurement.update',$AssetApproval->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="form-group">
                    <strong>PO Number</strong>
                    <input type="text" name="PO_number" class="form-control" placeholder="PO Number" value={{$AssetApproval->PO_number}}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="form-group">
                    <strong>Invoice Number</strong>
                    <input type="text" name="invoice_number" class="form-control" placeholder="Invoice" value={{$AssetApproval->invoice_number}}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="form-group">
                    <strong>DO Number</strong>
                    <input type="text" name="DO_number" class="form-control" placeholder="DO Number" value={{$AssetApproval->DO_number}}>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                @if ($AssetApproval->PO_number <> " " && $AssetApproval->invoice_number <> " " && $AssetApproval->DO_number <> " ")
                    <input type="hidden" name="flag_prucurement" value="1">
                    <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure to submit this data?')">Confirm</button>
                @else
                    <input type="hidden" name="flag_prucurement" value="0">
                    <button type="submit" class="btn btn-info" onclick="return confirm('Are you sure to save this data?')">Update</button>
                @endif
                <a class="btn btn-secondary" href="{{ route('procurement.index') }}"> Back</a>
            </div>
        </form>
    </div>

</div>

@endsection