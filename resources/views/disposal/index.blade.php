@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>List Disposal Asset</h2>
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
            <th width="100px" class="text-center">Model</th>
            <th width="280px" class="text-center">Serial Number</th>
            <th width="280px" class="text-center">Details</th>
            <th width="120px" class="text-center">Request By</th>
            <th width="200px" class="text-center">Action</th>
        </tr>
        @foreach ($DisposalAssets as $Disposal)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{ $Disposal->Asset->asset_model_id }}</td>
            <td>{{ $Disposal->Asset->Serial_number }}</td>
            <td>{{ $Disposal->Disposal_reason }}</td>
            <td class="text-center">{{ $Disposal->DisposalRequest->Disposal_by }}</td>
            <td class="text-center">
                <a class="btn btn-primary btn-sm" href="{{ route('disposal.edit',$Disposal->id) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </table>


@endsection