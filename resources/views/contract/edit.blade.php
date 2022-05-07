@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Contract</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('vendor.show',$Contract->Vendor_id) }}"> Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('contract.update',$Contract->id) }}" method="POST">
        @csrf
        @method('PUT') 

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Vendor:</strong>
                    <select class="form-control" name="Vendor_id" id="Vendor_id">
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
                    <strong>Contract Model:</strong>
                    <select class="form-control" name="Contract_model" id="Contract_model">
                        <option value = "0">Pilih Model</option>
                        <option <?php if ($Contract->Contract_model == "Model 1") echo "selected=selected" ?> value = "Model 1">Model 1</option>
                        <option <?php if ($Contract->Contract_model == "Model 2") echo "selected=selected" ?> value = "Model 2">Model 2</option>
                        <option <?php if ($Contract->Contract_model == "Model 3") echo "selected=selected" ?> value = "Model 3">Model 3</option>
                        {{-- @foreach ($vendors as $vendor) --}}
                        {{-- <option value="{{ $vendor->id }}">{{ $vendor->Vendor_name }}</option> --}}
                        {{-- @endforeach --}}
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Aquisition Method:</strong>
                    <select class="form-control" name="Aquisition_method" id="Aquisition_method">
                        <option value = "0">Pilih Metode</option>
                        <option <?php if ($Contract->Aquisition_method == "Metode 1") echo "selected=selected" ?> value = "Metode 1">Metode 1</option>
                        <option <?php if ($Contract->Aquisition_method == "Metode 2") echo "selected=selected" ?> value = "Metode 2">Metode 2</option>
                        <option <?php if ($Contract->Aquisition_method == "Metode 3") echo "selected=selected" ?> value = "Metode 3">Metode 3</option>
                        {{-- @foreach ($vendors as $vendor) --}}
                        {{-- <option value="{{ $vendor->id }}">{{ $vendor->Vendor_name }}</option> --}}
                        {{-- @endforeach --}}
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Expendiature Type:</strong>
                    <select class="form-control" name="Expendiature_type" id="Expendiature_type">
                        <option value = "0">Pilih Type</option>
                        <option <?php if ($Contract->Expendiature_type == "Type 1") echo "selected=selected" ?> value = "Type 1">Type 1</option>
                        <option <?php if ($Contract->Expendiature_type == "Type 2") echo "selected=selected" ?> value = "Type 2">Type 2</option>
                        <option <?php if ($Contract->Expendiature_type == "Type 3") echo "selected=selected" ?> value = "Type 3">Type 3</option>
                        {{-- @foreach ($vendors as $vendor) --}}
                        {{-- <option value="{{ $vendor->id }}">{{ $vendor->Vendor_name }}</option> --}}
                        {{-- @endforeach --}}
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cost:</strong>
                    <input type="text" name="Cost" class="form-control" placeholder="Cost" value="{{ $Contract->Cost }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Cost Currently:</strong>
                    <input type="text" name="Cost_currently" class="form-control" placeholder="Cost Currently" value="{{ $Contract->Cost_currently }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
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
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="form-group">
                    <strong>Notes:</strong>
                    {{-- <input type="text" name="Jabatan" class="form-control" placeholder="Jabatan"> --}}
                    <textarea class="form-control" style="height:150px" name="Description" placeholder="Notes" >{{ $Contract->Description }}</textarea>
                </div>
            </div>
    
            {{-- <input type="hidden" value="{{ Auth::user()->name }}" name="Created_by"> --}}
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form> 
@endsection
