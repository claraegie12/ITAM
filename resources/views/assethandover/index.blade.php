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
                        <th >Model</th>
                        <th >From</th>
                        <th >To</th>
                        <th >Date</th>
                        <th width="100px" class="text-center">Status</th>
                    </tr>
                    @foreach ($Handovers as $Handover)
                    <tr>
                        <td class="text-center">{{$loop->iteration}}</td>
                        <td>{{ $Handover->Asset->AssetModel->Model_category }} - {{ $Handover->Asset->AssetModel->Model_name }}</td>
                        <td>{{ $Handover->Handover_by }}</td>
                        <td>{{ isset($Handover->Pegawai->Name) ?  $Handover->Pegawai->Name : ''}}</td>
                        <td>
                            @if ($Handover->handover_approval == '1')
                                {{$Handover->Handover_date}}
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($Handover->flag == '1' && $Handover->return_approval <> '1')
                            <form action="{{ route('assethandover.update',$Handover->id) }}" method="POST">
                                @csrf
                                @method('PUT') 
                                    <input type="hidden" value = "2" name="handover_approval"/>
                                    <input type="hidden" value = "1" name="flag"/>
                                    <input type="hidden" value = "{{$Handover->Pegawai_id}}" name="Pegawai_id"/>
                                    <input type="hidden" value = "1" name="return_approval"/>
                                    <input type="hidden" value="{{ Auth::user()->name }}" name="return_to">
                                    <input type="hidden" value = "{{$Handover->Asset_id}}" name="Asset_id"/>
                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Are you sure to return this asset?')">Accept</button>
                            </form>
                            @elseif ($Handover->flag == '1' && $Handover->return_approval == '1')
                                Return to IT
                            @elseif ($Handover->handover_approval == '0')
                                Waiting Approval
                            @elseif ($Handover->handover_approval == '1')
                                Approved
                            @elseif ($Handover->handover_approval == '2')
                                Reject
                            @endif
                        </td> 
                    </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>


@endsection