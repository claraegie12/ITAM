@extends('template')

@section('content')
<div class="card-header pb-0">
    <div class="row">
    <div class="col-lg-6 col-7">
        <h6>Add New Branch</h6>
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

<form action="{{ route('branch.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p class="text-sm mb-0">Branch Name</p>
                <input type="text" name="Name" class="form-control" placeholder="Branch Name or City">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p class="text-sm mb-0">Phone</p>
                <input type="text" name="Phone" class="form-control" placeholder="Ext-phone">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p class="text-sm mb-0">Address</p>
                <textarea class="form-control" style="height:150px" name="Alamat" placeholder="Address"></textarea> 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-info" href="{{ route('branch.index') }}">Back</a>
        </div>
    </div>

</form>
@endsection