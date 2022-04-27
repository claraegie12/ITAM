@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>List Model</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('assetmodel.create') }}">Tambah Model Baru</a>
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
            <th width="280px"class="text-center">Nama Model</th>
            <th width="280px"class="text-center">Category</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($AssetModels as $AssetModel)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{ $AssetModel->Model_name }}</td>
            <td>{{ $AssetModel->Model_category }}</td>
            <td class="text-center">
                <a class="btn btn-primary btn-sm" href="{{ route('assetmodel.edit',$AssetModel->id) }}">Edit</a>
            </td>
        </tr>
        @endforeach
    </table>


@endsection