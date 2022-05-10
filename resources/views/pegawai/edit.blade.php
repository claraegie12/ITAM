@extends('template')

@section('content')
    <div class="card-header pb-0">
        <div class="row">
        <div class="col-lg-6 col-7">
            <h6>Edit Staff</h6>
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

    <form action="{{ route('pegawai.update',$pegawai->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Staff ID</strong>
                <input type="text" readonly name="NIK" class="form-control" value="{{ $pegawai->NIK_pegawai }}">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email</strong>
                <input type="text" name="Email" readonly value="{{ $pegawai->User->email }}" class="form-control" placeholder="Staff Email">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Join Date</strong>
                <input type="text" value="{{ $pegawai->Join_date }}" class="form-control" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Staff Name</strong>
                <input type="text" name="Name" value="{{ $pegawai->Name }}" class="form-control" placeholder="Staff Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Branch</strong>
                <select class="form-control" name="Branch" id="Branch">
                    @foreach ($branches as $branch)
                        @if($branch->id == $pegawai->Branch)
                            <option selected="selected" value="{{ $branch->id }}">{{ $branch->Name }}</option>
                        @else
                            <option value="{{ $branch->id }}">{{ $branch->Name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Division</strong>
                <select class="form-control" name="bagian" id="bagian">
                    @foreach ($bagians as $bagian)
                        @if($bagian->Name == $pegawai->bagian)
                            <option selected="selected" value="{{ $bagian->Name }}">{{ $bagian->Name }}</option>
                        @else
                            <option value="{{ $bagian->Name }}">{{ $bagian->Name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Position</strong>
                <input type="text" name="Jabatan" value="{{ $pegawai->Jabatan }}" class="form-control" placeholder="Staff Position">
            </div>
        </div>
        
        {{-- <div class="col-xs-6 col-sm-6 col-md-6">
            <div class="form-group">
                <strong>Resign Date</strong>
                @if ($pegawai->flags == "2")
                <input type="text" name="Resign_date" value="{{ $pegawai->Resign_date }}" class="form-control" placeholder="YYYY-mm-dd">
                @else
                <input type="text" name="Resign_date" value="" class="form-control" placeholder="YYYY-mm-dd">
                @endif
            </div>
        </div> --}}
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure to submit this data?')">Update</button>
            <a class="btn btn-info" href="{{ route('pegawai.index') }}">Back</a>
        </div>
    </div>

    </form>
@endsection
