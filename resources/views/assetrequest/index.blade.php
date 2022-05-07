@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>List Request</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('assetrequest.create') }}">Buat Request Baru</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="280px"class="text-center">Request Model</th>
            <th width="280px"class="text-center">Quantity</th>
            <th width="480px"class="text-center">Description</th>
            <th width="480px"class="text-center">Request Date</th>
            <th width="480px"class="text-center">Request By</th>
            <th width="480px"class="text-center">Status</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($AssetRequests as $AssetRequest)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{ $AssetRequest->AssetModels->Model_name }}</td>
            <td>{{ $AssetRequest->Qty }}</td>
            <td>{{ $AssetRequest->Description }}</td>
            <td>{{ $AssetRequest->Request_date }}</td>
            <td>{{ $AssetRequest->Created_by }}</td>
            <td>
                <?php 
                    if ($AssetRequest->AssetApproval->Approval == "0" ){
                        echo "Waiting Approval";
                    }
                    else if ($AssetRequest->AssetApproval->Approval == "1" ){
                        echo "Approved";
                    }
                    else if ($AssetRequest->AssetApproval->Approval == "2" ){
                        echo "Rejected";
                    }
                    else {
                        echo "-";
                    }
                ?>
            </td>
            <td class="text-center">
                {{-- <a class="btn btn-primary btn-sm" href="{{ route('vendor.edit',$AssetRequest->id) }}">Edit</a> --}}
                {{-- <a class="btn btn-info btn-sm" href="{{ route('pegawai.show',$pegawai->id) }}">Details</a> --}}
                <form action="{{ route('assetrequest.destroy',$AssetRequest->id) }}" method="POST"> 
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>


@endsection