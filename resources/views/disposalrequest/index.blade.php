@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>List Disposal Request</h2>
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
            <th width="100px" class="text-center">Status</th>
            <th width="280px" class="text-center">Details</th>
            <th width="120px" class="text-center">Request By</th>
            <th width="200px" class="text-center">Action</th>
        </tr>
        @foreach ($Disposals as $Disposal)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{ $Disposal->Asset->asset_model_id }}</td>
            <td>{{ $Disposal->Asset->Serial_number }}</td>
            <td class="text-center">{{ $Disposal->Approval }}</td>
            <td>{{ $Disposal->Notes }}</td>
            <td class="text-center">{{ $Disposal->Disposal_by }}</td>
            <td class="text-center">
            <?php if($Disposal->Approval == "Waiting for Approval"){ ?>
                <form action="{{ route('disposalrequest.update',  $Disposal->id) }}" method="post">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <input type="hidden" name="Approval" value="Approved">
                    <input type="hidden" value="{{ Auth::user()->name }}" name="Approval_by"> 
                    <button type="submit" class="btn btn-success btn-sm" >Approved</button>
                </form>
                <form action="{{ route('disposalrequest.update',  $Disposal->id) }}" method="post">
                    {{ method_field('PATCH') }}
                    {{ csrf_field() }}
                    <input type="hidden" name="Approval" value="Rejected">
                    <input type="hidden" value="{{ Auth::user()->name }}" name="Approval_by"> 
                    <button type="submit" class="btn btn-danger btn-sm" >Reject</button>
                </form>
            <?php 
            }
            else{ ?>
                <a class="btn btn-primary btn-sm" href="{{ route('disposalrequest.show',$Disposal->id) }}">Details</a>
            <?php } ?>
            </td>
        </tr>
        @endforeach
    </table>


@endsection