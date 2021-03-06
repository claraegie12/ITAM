@extends('template')

@section('content')
<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>List Approval</h6>
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
                    <th>Quantity</th>
                    <th>Request Date</th>
                    <th>Request By</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
                @foreach ($AssetRequests as $AssetRequest)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{ $AssetRequest->name }}</td>
                    <td>{{ $AssetRequest->Qty }}</td>
                    <td>{{ $AssetRequest->Request_date }}</td>
                    <td>{{ $AssetRequest->Created_by }}</td>
                    <td class="text-center">
                        @if($AssetRequest->status == "0")
                            Waiting Approval
                        @elseif($AssetRequest->status == '1')
                            Approved
                        @elseif($AssetRequest->status == '2')
                            Rejected
                        @endif
                        {{--  --}}
                        {{-- <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to reject this request?')">Reject</button> --}}
                    </td>
                    <td class="text-center">
                        @if($AssetRequest->status == "0")
                            <a class="btn btn-info btn-sm" href="{{ route('assetapproval.edit',$AssetRequest->id) }}">Process</a>
                        @elseif($AssetRequest->status == '1' && !isset($AssetRequest->AssetApproval))
                            <a class="btn btn-success btn-sm" href="{{ route('purchaserequest.edit', $AssetRequest->id) }}">Procurement</a>
                        @elseif($AssetRequest->status == '1' && isset($AssetRequest->AssetApproval))
                            <a class="btn btn-secondary btn-sm" href="{{ route('assetapproval.show', $AssetRequest->AssetApproval->id) }}">Details</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection