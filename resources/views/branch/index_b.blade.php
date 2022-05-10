@extends('template')

@section('content')
    <div class="card-header pb-0">
        <div class="row">
        <div class="col-lg-6 col-7">
            <h6>List Division</h6>
            <p class="text-sm mb-0">
                <a class="btn btn-success" href="{{ route('bagian.create') }}">Add New Division</a>
            </p>
            @if ($message = Session::get('succes'))
            <p class="text-sm mb-0">
                <i class="fa fa-check text-info" aria-hidden="true"></i>
                <span class="font-weight-bold ms-1">{{ $message }}</span> 
            </p>
            @endif
        </div>
    </div>

    <div class="card-body px-0 pb-2">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($Bagians as $bagian)
                <tr>
                    <td class="text-center">
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{$loop->iteration}}</h6>
                        </div>
                    </td>
                    <td>
                        <div class="d-flex flex-column justify-content-center">
                            <h6 class="mb-0 text-sm">{{ $bagian->Name }}</h6>
                        </div>
                    </td>
                   
                    <td class="text-center">
                        <a class="btn btn-primary btn-sm" href="{{ route('bagian.edit',$bagian->id) }}">Edit</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection