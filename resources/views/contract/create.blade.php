@extends('template')

@section('content')
<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>Add New Contract</h6>
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



<form action="{{ route('contract.store') }}" method="POST">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vendor:</strong>
                <select class="form-control" name="Vendor_id" id="Vendor_id">
                    <option value = "0">Pilih Vendor</option>
                    @foreach ($vendors as $vendor)
                    <option value="{{ $vendor->id }}">{{ $vendor->Vendor_name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Contract Model</strong>
                <select class="form-control" name="Contract_model" id="Contract_model">
                    <option>Choose One</option>
                    <option value = "Monthly">Monthly</option>
                    <option value = "Yearly">Yearly</option>
                    <option value = "One Time">One Time</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Aquisition Method</strong>
                <select class="form-control" name="Aquisition_method" id="Aquisition_method">
                    <option>Choose Method</option>
                    <option value = "Purchase">Purchase</option>
                    <option value = "Financial Lease">Financial Lease</option>
                    <option value = "Operational Lease">Operational Lease</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Expendiature Type</strong>
                <select class="form-control" name="Expendiature_type" id="Expendiature_type">
                    <option>Choose Type</option>
                    <option value = "Direct">Direct</option>
                    <option value = "Non Direct">Non Direct</option>
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cost</strong>
                <input type="text" name="Cost" class="form-control" placeholder="Cost">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cost Currency</strong>
                <select class="form-control" name="Cost_currently" id="Cost_currently">
                    <option value = "0">Choose Type</option>
                    <option value = "IDR">IDR</option>
                    <option value = "USD">USD</option>
                </select>
               
            </div>
        </div>
        {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cost Center:</strong>
                <input type="text" name="Cost_center" class="form-control" placeholder="Cost Center">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Member Firm:</strong>
                <input type="text" name="Member_firm" class="form-control" placeholder="Member Firm">
            </div>
        </div> --}}
        <div class="col-xs-12 col-sm-12 col-md-12" >
            <div class="form-group">
                <strong>Notes:</strong>
                <textarea class="form-control" style="height:150px" name="Description" placeholder="Notes"></textarea>
            </div>
        </div>
        <input type="hidden" name="Cost_center" class="form-control" value="-">
        <input type="hidden" name="Member_firm" class="form-control" value="-">
        <input type="hidden" value="{{ Auth::user()->name }}" name="Created_by">
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-info">Submit</button>
            <a class="btn btn-secondary" href="{{ route('contract.index') }}"> Back</a>
        </div>
    </div>

</form>
</div>

@endsection