@extends('template')

@section('content')
<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>List Request</h6>
            <p class="text-sm mb-0">
                <a class="btn btn-success" href="{{ route('assetrequest.create') }}">Add New Request Asset</a>
            </p>
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
                    <th width="20px" class="text-center">No</th>
                    <th width="280px"class="text-center">Request Name</th>
                    <th width="280px"class="text-center">Quantity</th>
                    
                    {{-- <th width="480px"class="text-center">Description</th> --}}
                    <th width="480px"class="text-center">Request Date</th>
                    <th width="480px"class="text-center">Request By</th>
                    <th width="480px"class="text-center">Status</th>
                    <th class="text-center">Action</th>
                </tr>
                @foreach ($AssetRequests as $AssetRequest)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{ $AssetRequest->name }}</td>
                    <td>{{ $AssetRequest->Qty }}</td>
                    {{-- <td>{{ $AssetRequest->Description }}</td> --}}
                    <td>{{ $AssetRequest->Request_date }}</td>
                    <td>{{ $AssetRequest->Created_by }}</td>
                    <td class="align-middle text-center text-sm">
                        @if ($AssetRequest->Qty == 0)
                            <span class='badge badge-sm bg-gradient-secondary'>Draft</span>
                            
                        @elseif ($AssetRequest->status == "0" )
                            <span class='badge badge-sm bg-gradient-info'>Waiting Approval</span>
                            
                        @elseif ($AssetRequest->status == "1" )
                            <span class='badge badge-sm bg-gradient-success'>Approved</span>
                            
                        @elseif ($AssetRequest->status == "2" )
                            <span class='badge badge-sm bg-gradient-danger'>Rejected</span>

                        @else 
                            -
                        @endif

                    </td>
                    
                    <td class="text-center">
                        @if($AssetRequest->Qty == 0)
                        <form action="{{ route('assetrequest.destroy',$AssetRequest->id) }}" method="POST"> 
                            @csrf
                            @method('DELETE')
                            <a class="btn btn-info btn-sm" href="{{ route('assetrequest.show',$AssetRequest->id) }}">Edit</a>
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to remove this data?')">Remove</button>
                        </form>
                        @else
                        <a class="btn btn-info btn-sm" href="{{ route('itemrequest.show',$AssetRequest->id) }}">Details</a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection