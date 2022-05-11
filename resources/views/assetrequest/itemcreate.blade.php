@extends('template')

@section('content')

<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>Add Item to Request</h6>
            <p class="text-sm mb-0"></p>
            @if ($errors->any())
                <span class="font-weight-bold ms-1">Whoops! There were some problems with your input.</span>
                <p class="text-sm mb-0">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </p>
            @endif
            @if ($message = Session::get('succes'))
            <p class="text-sm mb-0">
                <i class="fa fa-check text-info" aria-hidden="true"></i>
                <span class="font-weight-bold ms-1">{{ $message }}</span> 
            </p>
            @endif
        </div>
    </div>

<form action="{{ route('itemrequest.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Model</strong>
                <select class="form-control" name="Asset_model_id" id="Asset_model_id">
                    <option>Choose Model</option>
                    @foreach ($AssetModels as $AssetModel)
                    <option value="{{ $AssetModel->id }}">{{ $AssetModel->Model_category }} - {{ $AssetModel->Model_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity</strong>
                <input type="text" name="Quantity" class="form-control" placeholder="Quantity">
            </div>
        </div>
        <input type="hidden" value="{{$AssetRequest->id}}" name="Asset_id">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-info">Add</button>
            @if(count($Items) > 0)
                <a class="btn btn-success" href="{{ route('itemrequest.show',$AssetRequest->id) }}"> Confirm</a>
            @endif
        </div>
    </div>
</form>
    @if(count($Items) > 0)
    <div class="card-body px-0 pb-2">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                <tr>
                    <th class="text-center">No</th>
                    <th class="text-center">Nama Model</th>
                    <th class="text-center">Quantity</th>
                    <th colspan=2 class="text-center">Action</th>
                </tr>
                </thead>    
                <tbody>
                @foreach ($Items as $Item)
                
                    
                    <tr>
                        <form action="{{ route('itemrequest.update',$Item->id) }}" method="POST">
                            @csrf
                            @method('PUT') 
                            <td class="text-center">{{$loop->iteration}}</td>
                            <td>{{ $Item->AssetModels->Model_category }} - {{ $Item->AssetModels->Model_name }}</td>
                            <td><input type="text" name="Qty" class="form-control" placeholder="Quantity" value="{{ $Item->Qty }}"></td>
                            <td class="text-center">
                                <button type="submit" class="btn btn-info btn-sm">Edit</button>
                                <input type="hidden" value="{{$AssetRequest->id}}" name="Asset_id">
                            </td>
                        </form> 
                        <form action="{{ route('itemrequest.destroy',$Item->id) }}" method="POST">

                            @csrf
                            @method('DELETE')
                            <td class="text-center">
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to remove this data?')">Remove</button>
                            </td>
                            </form>
                    </tr>
               
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    {{-- @else
    NULL --}}
    @endif


</div>

@endsection