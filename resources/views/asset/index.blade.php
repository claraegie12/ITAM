@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>List Asset</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('assetrequest.create') }}">Pengadaan Asset Baru</a>
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
            <th width="280px" class="text-center">Request Model</th>
            <th width="280px" class="text-center">Invoice Number</th>
            <th width="280px" class="text-center">Status</th>
            <th width="280px" class="text-center">Action</th>
        </tr>
        @foreach ($Assets as $Asset)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{ $Asset->AssetRequest->AssetModels->Model_name }}</td>
            <td>{{ $Asset->invoice_number }}</td>
            <td>
                Approved
            </td>
            <td class="text-center">
                <a class="btn btn-primary btn-sm" href="{{ route('asset.show', $Asset->id) }}">Edit</a>
                <a class="btn btn-info btn-sm" href="{{ route('asset.edit',$Asset->id) }}">Details</a>
                
            </td>
        </tr>
        @endforeach
    </table>


@endsection