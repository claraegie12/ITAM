@extends('template')

@section('content')
    <div class="card-header pb-0">
        <div class="row">
        <div class="col-lg-6 col-7">
            <h6>List Disposal Request</h6>
            
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
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Model</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Resale Price</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Qty</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                        <th colspan=2 class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($Disposals as $Disposal)
                <tr>
                    <td class="text-center">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$loop->iteration}}</h6>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $Disposal->AssetModel->Model_name }}</h6>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ number_format($Disposal->resale_price,0) }}</h6>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $Disposal->qty }}</h6>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="d-flex flex-column justify-content-center">
                            @if ( $Disposal->Approval == '0' )
                                Waiting Approval
                            @elseif ( $Disposal->Approval == '1' )
                                Approved
                            @elseif ( $Disposal->Approval == '2' )
                                Reject
                            @endif
                        </div>
                    </td>

                    <td class="text-center">
                        <div class="d-flex flex-column justify-content-center">
                            @if ( $Disposal->Approval == '0' )
                            <form action="{{ route('disposalrequest.update',$Disposal->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                    <input type="hidden" name="Asset_id" value="{{$Disposal->Asset_id}}">
                                    <input type="hidden" name="Approval" value="1">
                                    <input type="hidden" name="Approval_by" value="{{ Auth::user()->name }}">
                                    <button type="submit" class="btn btn-info">Approve</button>
                            </form>
                        </div>
                    </td>
                    <td class="text-center">
                        <div class="d-flex flex-column justify-content-center">
                            <form action="{{ route('disposalrequest.update',$Disposal->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                    <input type="hidden" name="Asset_id" value="{{$Disposal->Asset_id}}">
                                    <input type="hidden" name="Approval" value="2">
                                    <input type="hidden" name="Approval_by" value="{{ Auth::user()->name }}">
                                    <button type="submit" class="btn btn-danger">Reject</button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection