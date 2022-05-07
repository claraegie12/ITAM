@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>List Contract</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('contract.create') }}">Tambah Contract Baru</a>
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
            <th width="280px"class="text-center">Contract Model</th>
            <th width="280px"class="text-center">Aquisition Method</th>
            <th width="480px"class="text-center">Expendiature Type</th>
            <th width="480px"class="text-center">Cost</th>
            <th width="480px"class="text-center">Cost Currently</th>
            <th class="text-center">Cost Center</th>
            <th class="text-center">Member Firm</th>
            <th class="text-center">Notes</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($contracts as $contract)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{ $contract->Contract_model }}</td>
            <td>{{ $contract->Aquisition_method }}</td>
            <td>{{ $contract->Expendiature_type }}</td>
            <td>{{ $contract->Cost }}</td>
            <td>{{ $contract->Cost_currently }}</td>
            <td>{{ $contract->Cost_center }}</td>
            <td>{{ $contract->Member_firm }}</td>
            <td>{{ $contract->Description }}</td>
            <td class="text-center">
                <a class="btn btn-primary btn-sm" href="{{ route('contract.edit',$contract->id) }}">Edit</a>
                {{-- <form action="{{ route('pegawai.destroy',$pegawai->id) }}" method="POST"> --}}

                   {{-- <a class="btn btn-info btn-sm" href="{{ route('pegawai.show',$pegawai->id) }}">Details</a> --}}

                    

                    {{-- @csrf --}}
                    {{-- @method('DELETE') --}}

                    {{-- <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button> --}}
                {{-- </form> --}}
            </td>
        </tr>
        @endforeach
    </table>


@endsection