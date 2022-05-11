@extends('template')

@section('content')
<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-12 col-12">
            <h4>Approval Details</h4>
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
        </div>
    </div>
</div>
@endsection
