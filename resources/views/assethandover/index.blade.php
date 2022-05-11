@extends('template')

@section('content')

    <div class="card-header pb-0">
        <div class="row">
            <div class="col-lg-6 col-7">
                <h6>List Handover</h6>
                <p class="text-sm mb-0">
                    <a class="btn btn-success" href="{{ route('assethandover.create') }}">Create New Handover</a>
                </p>
            </div>
        </div>
        <div class="card-body px-0 pb-2">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">

                    <tr>
                        <th width="20px" class="text-center">No</th>
                        <th width="200px" class="text-center">Model</th>
                        <th width="280px" class="text-center">From</th>
                        <th width="100px" class="text-center">To</th>
                        <th width="280px" class="text-center">Date</th>
                        <th width="100px" class="text-center">Action</th>
                    </tr>
                    @foreach ($Handovers as $Handover)
                    <tr>
                        {{-- <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{ $Asset->AssetModel->Model_category }}</td>
                        <td>{{ $Asset->AssetModel->Model_name }}</td>
                        <td class="text-center">{{ $Asset->Serial_number }}</td>
                        <td>Power : {{ $Asset->Power }}, Width : {{ $Asset->Width }}, Height : {{ $Asset->Height }}</td>
                        <td class="text-center">
                            <?php if($Asset->Jenis_asset == "Ready") { ?>
                                <a class="btn btn-primary btn-sm" href="{{ route('assethandover.edit',$Asset->id) }}">Create Handover</a>
                                <a class="btn btn-warning btn-sm" href="{{ route('disposalrequest.edit',$Asset->id) }}">Disposal Request</a>
                            <?php } else if($Asset->Jenis_asset == "Owned") { ?>
                                <a class="btn btn-info btn-sm" href="{{ route('assethandover.show',$Asset->id) }}">Details</a>
                            <?php } ?>
                            {{-- <a class="btn btn-info btn-sm" href="{{ route('pegawai.show',$pegawai->id) }}">Details</a> --}}
                            
                        </td> --}}
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>


@endsection