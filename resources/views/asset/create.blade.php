@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Details Asset</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('asset.index') }}">Back</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your update.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('asset.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Model:</strong>
                    <input type="text" readonly name="Asset_model" class="form-control" value="{{ $AssetApproval->AssetRequest->AssetModels->Model_name}}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Jumlah:</strong>
                    <input type="text" readonly name="Qty" class="form-control" value="{{ $AssetApproval->AssetRequest->Qty}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="form-group">
                    <strong>Keterangan:</strong>
                    {{-- <input type="text" name="Jabatan" class="form-control" placeholder="Jabatan"> --}}
                    <textarea class="form-control" readonly style="height:150px"  placeholder="Notes" >{{ $AssetApproval->AssetRequest->Description }}</textarea>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Invoice Number:</strong>
                    <input type="text" name="invoice_number" readonly class="form-control" value="{{ $AssetApproval->invoice_number}}">
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Vendor:</strong>
                    <input type="text" name="invoice_number" readonly class="form-control" value="{{ $Asset->Manufactured_by}}">
                </div>
            </div>
            <?php 
                if($Asset->Jenis_asset == "Idle"){

            ?>
            <input type="hidden" value="0" name="flag">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
                    <select class="form-control" name="Jenis_asset" id="Jenis_asset">
                        <option value = "Ready">Ready</option>
                        <option value = "WF">Won't Fix</option>
                    </select>
                </div>
            </div>
            <?php    } 
            else{
                echo "<input type='hidden' value='1' name='flag'>";
            } ?>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Power:</strong>
                    <input type="text" name="Power" class="form-control" value="{{ $Asset->Power}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Width:</strong>
                    <input type="text" name="Width" class="form-control" value="{{ $Asset->Width}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Height:</strong>
                    <input type="text" name="Height" class="form-control" value="{{ $Asset->Height}}">
                </div>
            </div>
            <input type="hidden" value="{{ $AssetApproval->id }}" name="id">
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form> 
@endsection
