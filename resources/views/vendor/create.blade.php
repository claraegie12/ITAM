@extends('template')

@section('content')
<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>Add New Vendor</h6>
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

    <form action="{{ route('vendor.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Vendor Name</strong>
                    <input type="text" name="Vendor_name" class="form-control" placeholder="Vendor Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Phone</strong>
                    <input type="text" name="Vendor_phone" class="form-control" placeholder="Phone">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="form-group">
                    <strong>Address</strong>
                    <textarea class="form-control" style="height:150px" name="Vendor_address" placeholder="Address"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bank</strong>  
                    <input type="text" name="Vendor_bank_acc" class="form-control" placeholder="Bank">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Account Number</strong>  
                    <input type="text" name="Vendor_account" class="form-control" placeholder="Account Number">
                </div>
            </div>
            <input type="hidden" value="1900-12-31" name="Resign_date">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-info">Submit</button>
                <a class="btn btn-secondary" href="{{ route('vendor.index') }}"> Back</a>
            </div>
        </div>

    </form>
</div>

@endsection