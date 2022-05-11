@extends('template')

@section('content')

<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-12 col-12">
            <h4>List Request Asset</h4>
           
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
                    @foreach ($Items as $Item)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td >{{ $Item->AssetModels->Model_category }} - {{ $Item->AssetModels->Model_name }}</td>
                            <td class="text-center">{{ $Item->Qty }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
           
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <form action="{{ route('assetapproval.update',$AssetRequest->id) }}" method="POST">
                    @csrf
                    @method('PUT') 
                        <input type="hidden" value = "1" name="status"/>
                        <input type="hidden" value="{{ Auth::user()->name }}" name="approved_by">
                        <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are you sure to approve this data?')">Approve</button>
                </form>
                <form action="{{ route('assetapproval.update',$AssetRequest->id) }}" method="POST">
                    @csrf
                    @method('PUT') 
                        <input type="hidden" value = "2" name="status"/>
                        <input type="hidden" value="{{ Auth::user()->name }}" name="approved_by">
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to reject this data?')">Reject</button>
                </form>
            </div>
           
        </div>



</div>

@endsection