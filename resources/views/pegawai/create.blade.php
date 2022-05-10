@extends('template')

@section('content')
<div class="card-header pb-0">
    <div class="row">
    <div class="col-lg-6 col-7">
        <h6>Add New Headcount</h6>
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

<form action="{{ route('pegawai.store') }}" method="POST">
    @csrf

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Staff ID</strong>
                <input type="text" name="NIK_pegawai" class="form-control" placeholder="Staff ID">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Staff Name</strong>
                <input type="text" name="Name" class="form-control" placeholder="Staff Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" >
            <div class="form-group">
                <strong>Email</strong>
                <input type="text" name="Email" class="form-control" placeholder="Email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Branch</strong>
                <select class="form-control" name="Branch" id="Branch">
                    <option value = "0">Choose Branch</option>
                    @foreach ($branches as $branch)
                    <option value="{{ $branch->id }}">{{ $branch->Name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Division:</strong>
                <select class="form-control" name="bagian" id="bagian">
                    <option value = "0">Choose Division</option>
                    @foreach ($bagians as $bagian)
                    <option value="{{ $bagian->Name }}">{{ $bagian->Name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12" >
            <div class="form-group">
                <strong>Position</strong>
                <input type="text" name="Jabatan" class="form-control" placeholder="Position">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Join Date:</strong>  
                <input type="text" name="Join_date" class="form-control" placeholder="YYYY-mm-dd">
            </div>
        </div>
        <input type="hidden" value="1900-12-31" name="Resign_date">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <a class="btn btn-info" href="{{ route('pegawai.index') }}">Back</a>
        </div>
    </div>

</form>

@endsection