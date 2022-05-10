@extends('template')

@section('content')


<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>List Contract {{ $vendor->Vendor_name}}</h6>
            <p class="text-sm mb-0">
                <a class="btn btn-secondary" href="{{ route('contract.index') }}"> Back</a>
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
                    <th class="text-center">No</th>
                    <th class="text-center">Contract</th>
                    <th class="text-center">Aquisition</th>
                    <th class="text-center">Type</th>
                    <th class="text-center">Cost</th>
                    <th class="text-center">Notes</th>
                    <th class="text-center">Action</th>
                </tr>
                @foreach ($vendor->Contracts as $contract)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{ $contract->Contract_model }}</td>
                    <td>{{ $contract->Aquisition_method }}</td>
                    <td>{{ $contract->Expendiature_type }}</td>
                    <td>
                        @if ($contract->Cost_currently == 'IDR')
                            Rp
                        @else
                            $
                        @endif
                        {{ number_format($contract->Cost,0) }}
                    </td>
                    <td width="280px"class="text-center">{{ $contract->Description }}</td>
                    <td class="text-center">
                        <a class="btn btn-info btn-sm" href="{{ route('contract.edit',$contract->id) }}">Edit</a>
                        {{-- <a class="btn btn-info btn-sm" href="{{ route('vendor.show',$vendor->id) }}">Contract</a> --}}
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

@endsection