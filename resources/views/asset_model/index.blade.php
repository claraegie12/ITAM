@extends('template')

@section('content')
<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>List Model</h6>
            <p class="text-sm mb-0">
                <a class="btn btn-success" href="{{ route('assetmodel.create') }}">Add New Model</a>
            </p>
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
                    <th width="20px" class="text-center">No</th>
                    <th width="280px"class="text-center">Nama Model</th>
                    <th width="280px"class="text-center">Category</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>    
                <tbody>
                @foreach ($AssetModels as $AssetModel)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{ $AssetModel->Model_name }}</td>
                    <td>{{ $AssetModel->Model_category }}</td>
                    <td class="text-center">
                        <a class="btn btn-info btn-sm" href="{{ route('assetmodel.edit',$AssetModel->id) }}">Edit</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection