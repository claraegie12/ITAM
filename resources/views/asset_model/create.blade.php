@extends('template')

@section('content')
<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>Add New Model</h6>
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
        </div>
    </div>


<form action="{{ route('assetmodel.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Model Name</strong>
                <input type="text" name="Model_name" class="form-control" placeholder="Model Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Category Name</strong>
                <input type="text" name="Model_category" class="form-control" placeholder="Category Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-info">Submit</button>
            <a class="btn btn-secondary" href="{{ route('assetmodel.index') }}"> Back</a>
        </div>
    </div>

</form>
</div>

@endsection