@extends('template')

@section('content')

<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-12 col-12">
            <h4>My Handover</h4>
           
            {{-- <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Request Name</span> : {{ $AssetRequest->name }}
            </p>
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Request Description</span> : {{ $AssetRequest->Description }}
            </p>
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Request Date</span> : {{ $AssetRequest->Request_date }}
            </p>
            <p class="text-ml mb-0">
                <span class="font-weight-bold ms-1">Request By</span> : {{ $AssetRequest->Created_by }}
            </p> --}}
        </div>
    </div>
       
        <div class="card-body px-0 pb-2">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nama Model</th>
                        <th class="text-center">Handover By</th>
                        <th colspan=2 class="text-center">Action</th>
                    </tr>
                    </thead>    
                    <tbody>
                    @foreach ($Handovers as $Item)
                        <tr>
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td >{{ $Item->Asset->AssetModel->Model_category }} - {{ $Item->Asset->AssetModel->Model_name }}</td>
                            <td class="text-center">{{ $Item->Handover_by }}</td>
                            @if ($Item->handover_approval == "0")
                            <td>
                                <form action="{{ route('assethandover.update',$Item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT') 
                                        <input type="hidden" value = "1" name="handover_approval"/>
                                        <input type="hidden" value = "0" name="flag"/>
                                        <input type="hidden" value = "{{$Item->Pegawai_id}}" name="Pegawai_id"/>
                                        <input type="hidden" value = "0" name="return_approval"/>
                                        <input type="hidden" value = "{{$Item->Asset_id}}" name="Asset_id"/>
                                        <button type="submit" class="btn btn-info btn-sm" onclick="return confirm('Are you sure to approve this data?')">Approve</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('assethandover.update',$Item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT') 
                                        <input type="hidden" value = "2" name="handover_approval"/>
                                        <input type="hidden" value = "0" name="flag"/>
                                        <input type="hidden" value = "{{$Item->Pegawai_id}}" name="Pegawai_id"/>
                                        <input type="hidden" value = "0" name="return_approval"/>
                                        <input type="hidden" value = "{{$Item->Asset_id}}" name="Asset_id"/>
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to reject this data?')">Reject</button>
                                </form>
                            </td>
                            @elseif ($Item->handover_approval == "1" && $Item->flag == "0")
                            <td  class="text-center" colspan=2>
                                <form action="{{ route('assethandover.update',$Item->id) }}" method="POST">
                                    @csrf
                                    @method('PUT') 
                                        <input type="hidden" value = "1" name="handover_approval"/>
                                        <input type="hidden" value = "1" name="flag"/>
                                        <input type="hidden" value = "{{$Item->Pegawai_id}}" name="Pegawai_id"/>
                                        <input type="hidden" value = "0" name="return_approval"/>
                                        <input type="hidden" value = "{{$Item->Asset_id}}" name="Asset_id"/>
                                        <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm('Are you sure to return this asset?')">Return</button>
                                </form>
                            </td>
                            @elseif ($Item->return_approval == "1" && $Item->flag == "1")
                            <td  class="text-center" colspan=2>Return to {{$Item->return_to}}</td>
                            @endif
                            
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
           
        </div>



</div>

@endsection