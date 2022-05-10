@extends('template')

@section('content')
   
<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>Edit Contract</h6>
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

    <form action="{{ route('contract.update',$Contract->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Vendor</strong>
                    <input type="hidden" name="Vendor_id" id="Vendor_id" value={{$Contract->Vendor_id}}>
                    <select class="form-control" disabled >
                        <option value = "0">Pilih Vendor</option>
                        @foreach ($vendors as $vendor)
                        <option 
                        <?php if ($Contract->Vendor_id == $vendor->id) echo "selected=selected" ?> value="{{ $vendor->id }}">{{ $vendor->Vendor_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Contract Model</strong>
                    <select class="form-control" name="Contract_model" id="Contract_model">
                        <option value = "0">Choose One</option>
                        <option <?php if ($Contract->Contract_model == "Monthly") echo "selected=selected" ?> value = "Monthly">Monthly</option>
                        <option <?php if ($Contract->Contract_model == "Yearly") echo "selected=selected" ?> value = "Yearly">Yearly</option>
                        <option <?php if ($Contract->Contract_model == "One Time") echo "selected=selected" ?> value = "One Time">One Time</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Aquisition Method</strong>
                    <select class="form-control" name="Aquisition_method" id="Aquisition_method">
                        <option value = "0">Choose Method</option>
                        <option <?php if ($Contract->Aquisition_method == "Purchase") echo "selected=selected" ?> value = "Purchase">Purchase</option>
                        <option <?php if ($Contract->Aquisition_method == "Operational Lease") echo "selected=selected" ?> value = "Operational Lease">Operational Lease</option>
                        <option <?php if ($Contract->Aquisition_method == "Financial Lease") echo "selected=selected" ?> value = "Financial Lease">Financial Lease</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Expendiature Type</strong>
                    <select class="form-control" name="Expendiature_type" id="Expendiature_type">
                        <option value = "0">Choose Type</option>
                        <option <?php if ($Contract->Expendiature_type == "Direct") echo "selected=selected" ?> value = "Direct">Direct</option>
                        <option <?php if ($Contract->Expendiature_type == "Non Direct") echo "selected=selected" ?> value = "Non Direct">Non Direct</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cost</strong>
                    <input type="text" name="Cost" class="form-control" placeholder="Cost" value="{{ $Contract->Cost }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cost Currency</strong>
                    <select class="form-control" name="Cost_currently" id="Cost_currently">
                        <option value = "0">Choose Type</option>
                        <option <?php if ($Contract->Cost_currently == "IDR") echo "selected=selected" ?> value = "IDR">IDR</option>
                        <option <?php if ($Contract->Cost_currently == "USD") echo "selected=selected" ?> value = "USD">USD</option>
                    </select>
                    {{-- <input type="text" name="Cost_currently" class="form-control" placeholder="Cost Currently" value="{{ $Contract->Cost_currently }}"> --}}
                </div>
            </div>
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cost Center:</strong>
                    <input type="text" name="Cost_center" class="form-control" placeholder="Cost Center" value="{{ $Contract->Cost_center }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Member Firm:</strong>
                    <input type="text" name="Member_firm" class="form-control" placeholder="Member Firm" value="{{ $Contract->Member_firm }}">
                </div>
            </div> --}}
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="form-group">
                    <strong>Notes:</strong>
                    <textarea class="form-control" style="height:150px" name="Description" placeholder="Notes" >{{ $Contract->Description }}</textarea>
                </div>
            </div>
            <input type="hidden" name="Cost_center" class="form-control" value="{{ $Contract->Cost_center }}">
            <input type="hidden" name="Member_firm" class="form-control" value="{{ $Contract->Member_firm }}">

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-info">Submit</button>
                <a class="btn btn-secondary" href="{{ route('contract.show',$Contract->Vendor_id) }}"> Back</a>
            </div>
        </div>
    </form> 
</div>
@endsection
