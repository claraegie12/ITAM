@extends('template')

@section('content')


<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>List Vendor</h6>
            <p class="text-sm mb-0">
                <a class="btn btn-success" href="{{ route('contract.create') }}">Add New Contract</a>
                {{-- <a class="btn btn-success" href="{{ route('contract.create') }}">Tambah Contract Baru</a> --}}
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
                    <th width="280px"class="text-center">Vendor Name</th>
                    <th width="280px"class="text-center">Contracts</th>
                    <th class="text-center">Action</th>
                </tr>
                @foreach ($vendors as $vendor)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{ $vendor->Vendor_name }}</td>
                    <td width="280px"class="text-center">{{ count($vendor->Contracts) }}</td>
                    <td class="text-center">
                        <a class="btn btn-info btn-sm" href="{{ route('contract.show',$vendor->id) }}">Details</a>
                        {{-- <a class="btn btn-info btn-sm" href="{{ route('vendor.show',$vendor->id) }}">Contract</a> --}}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection