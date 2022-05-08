@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>List Asset</h2>
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
            <th width="200px" class="text-center">Model</th>
            <th width="280px" class="text-center">Serial Number</th>
            <th width="100px" class="text-center">Status</th>
            <th width="280px" class="text-center">Details</th>
            <th width="100px" class="text-center">Action</th>
        </tr>
        @foreach ($Assets as $Asset)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{ $Asset->asset_model_id }}</td>
            <td>{{ $Asset->Serial_number }}</td>
            <td class="text-center">{{ $Asset->Jenis_asset }}</td>
            <td>Power : {{ $Asset->Power }}, Width : {{ $Asset->Width }}, Height : {{ $Asset->Height }}</td>
            <td class="text-center">
                <?php if($Asset->Jenis_asset == "Ready") { ?>
                    <a class="btn btn-primary btn-sm" href="{{ route('assethandover.edit',$Asset->id) }}">Create Handover</a>
                    <a class="btn btn-warning btn-sm" href="{{ route('disposalrequest.edit',$Asset->id) }}">Disposal Request</a>
                <?php } else if($Asset->Jenis_asset == "Owned") { ?>
                    <a class="btn btn-info btn-sm" href="{{ route('assethandover.show',$Asset->id) }}">Details</a>
                <?php } ?>
                {{-- <a class="btn btn-info btn-sm" href="{{ route('pegawai.show',$pegawai->id) }}">Details</a> --}}
                
            </td>
        </tr>
        @endforeach
    </table>


@endsection