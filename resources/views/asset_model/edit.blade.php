@extends('template')

@section('content')
<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>Edit Model</h6>
            <p class="text-sm mb-0">
                
            </p>
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
        </div>
    </div>

    <form action="{{ route('assetmodel.update',$AssetModel->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama Model:</strong>
                <input type="text" name="Model_name" class="form-control" placeholder="Nama Model" value="{{ $AssetModel->Model_name }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category:</strong>
                <input type="text" name="Model_category" value="{{ $AssetModel->Model_category }}" class="form-control" placeholder="Category">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-info">Update</button>
            <a class="btn btn-secondary" href="{{ route('assetmodel.index') }}">Back</a>
        </div>
    </div>

    </form> 
</div>
@endsection
