@extends('template')

@section('content')
<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>Add New Handover</h6>
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

    <form action="{{ route('assethandover.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>List Asset</strong>
                    <select class="form-control" name="Asset_id" id="Asset_id">
                        <option value = "0">Choose Asset</option>
                        @foreach ($Assets as $Asset)
                        <option value="{{ $Asset->id }}">{{ $Asset->AssetModel->Model_name }} - {{ $Asset->Serial_number }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>List Pegawai</strong>
                    <select class="form-control" name="Pegawai_id" id="Pegawai_id">
                        <option value = "0">Choose Pegawai</option>
                        @foreach ($Pegawais as $Pegawai)
                        <option value="{{ $Pegawai->id }}">{{ $Pegawai->Name }} - {{ $Pegawai->Branches->Name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <p class="text-sm mb-0">Notes</p>
                    <textarea class="form-control" style="height:150px" name="Handover_notes" placeholder="Handover Notes"></textarea> 
                </div>
            </div>
            <input type="hidden" value="{{ Auth::user()->name }}" name="Handover_by">
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-info">Submit</button>
                <a class="btn btn-secondary" href="{{ route('assethandover.index') }}">Back</a>
            </div>
        </div>

    </form>
</div>
@endsection