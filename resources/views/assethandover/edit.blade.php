@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Create Handover</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-secondary" href="{{ route('assethandover.index') }}"> Back</a>
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

    <form action="{{ route('assethandover.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Model:</strong>
                    <input type="text" readonly class="form-control" value="{{ $Asset->asset_model_id }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Serial Number:</strong>
                    <input type="text" readonly class="form-control" value="{{ $Asset->Serial_number }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Power:</strong>
                    <input type="text" readonly class="form-control" value="{{ $Asset->Power }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Pegawai :</strong>
                    <select class="form-control" name="Pegawai_id" id="Pegawai_id">
                        <option value = "0">Pilih Pegawai</option>
                        @foreach ($pegawais as $pegawai)
                        <option 
                         value="{{ $pegawai->id }}">{{ $pegawai->Name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Handover Date:</strong>
                    <input type="text" name="Handover_date" class="form-control" placeholder="yyyy-mm-dd">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" >
                <div class="form-group">
                    <strong>Notes:</strong>
                    {{-- <input type="text" name="Jabatan" class="form-control" placeholder="Jabatan"> --}}
                    <textarea class="form-control" style="height:150px" name="Handover_notes" placeholder="Notes"></textarea>
                </div>
            </div>
            <input type="hidden" value="{{ $Asset->id }}" name="Asset_id"> 
            <input type="hidden" value="{{ Auth::user()->name }}" name="Handover_by"> 
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form> 
@endsection
