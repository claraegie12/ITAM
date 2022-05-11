@extends('template')

@section('content')

<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>Details Disposal</h6>
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="form-group">
            <strong>Category</strong>
            <input type="text" name="Model" readonly class="form-control" value="{{ $Model->Model_category }}">
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-12">
        <div class="form-group">
            <strong>Model</strong>
            <input type="text" name="Power" readonly class="form-control" value="{{ $Model->Model_name}}">
        </div>
    </div>
    <div class="row">
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Power</strong>
                <input type="text" name="Power" readonly class="form-control" value="1200">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Height</strong>
                <input type="text" name="Power" readonly class="form-control" value="800">
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4">
            <div class="form-group">
                <strong>Width</strong>
                <input type="text" name="Power" readonly class="form-control" value="500">
            </div>
        </div>
    </div>
    <form action="{{ route('disposalrequest.store') }}" method="POST">
        @csrf
        <input type="hidden" name="Asset_id" value="{{$Model->id}}">
        <input type="hidden" name="Disposal_by" value="{{ Auth::user()->name }}">
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Broke</strong>
                    <input type="text" name="Height" readonly class="form-control" value="{{ isset($Model->Assets_broke) ? count($Model->Assets_broke) : 0 }}">
                </div>
            </div>
            
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Expired</strong>
                    <input type="text" name="Height" readonly class="form-control" value="{{ isset($Model->Asset_dis) ? count($Model->Asset_dis) : 0 }}">
                </div>
            </div>
        </div>
        <div class="form-check form-switch ps-0">
            <input class="form-check-input ms-auto" type="checkbox" id="Broke" name="Broke" checked>
            <label class="form-check-label text-body ms-3 text-truncate w-80 mb-0" for="flexSwitchCheckDefault">Disposed Broken Asset?</label>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <p class="text-sm mb-0">Notes</p>
                <textarea class="form-control" style="height:150px" name="Notes" placeholder="Notes"></textarea> 
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-info">Submit</button>
            <a class="btn btn-secondary" href="{{ route('disposalrequest.index') }}">Back</a>
        </div>
    </form>

</div>


@endsection