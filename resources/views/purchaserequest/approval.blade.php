@extends('template')

@section('content')
<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>List Request Procurement</h6>
            @if ($message = Session::get('succes'))
            <p class="text-sm mb-0">
                <i class="fa fa-check text-info" aria-hidden="true"></i>
                <span class="font-weight-bold ms-1">{{ $message }}</span> 
            </p>
            @endif
        </div>
    </div>

    <div class="card-body px-0 pb-2">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <tr>
                    <th class="text-center">No</th>
                    <th>Request Name</th>
                    <th>Request By</th>
                    <th>Request Date</th>
                    <th>Method</th>
                    <th>Vendor</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
                @foreach ($AssetApprovals as $AssetApproval)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{ $AssetApproval->AssetRequest->name }}</td>
                    <td>{{ $AssetApproval->request_by }}</td>
                    <td>{{ $AssetApproval->created_at }}</td>
                    <td>{{ $AssetApproval->Contract->Aquisition_method }}</td>
                    <td>{{ $AssetApproval->Contract->Vendor->Vendor_name }}</td>
                    <td class="text-center">
                        @if($AssetApproval->Approval == "0")
                            Waiting Approval
                        @elseif($AssetApproval->Approval == '1')
                            Approved
                        @elseif($AssetApproval->Approval  == '2')
                            Rejected
                        @endif
                        {{--  --}}
                        {{-- <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to reject this request?')">Reject</button> --}}
                    </td>
                    <td class="text-center">
                        @if($AssetApproval->Approval == "0")
                            <a class="btn btn-info btn-sm" href="{{ route('itempurchase.edit',$AssetApproval->id) }}">Process</a>
                        @else($AssetRequest->status == '1' && !isset($AssetRequest->AssetApproval))
                            <a class="btn btn-success btn-sm" href="{{ route('itempurchase.show', $AssetApproval->id) }}">Details</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection