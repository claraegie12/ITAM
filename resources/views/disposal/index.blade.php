@extends('template')

@section('content')
<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>List Asset</h6>
        </div>
    </div>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <tr>
                    <th class="text-center">No</th>
                    <th>Model</th>
                    <th>Category</th>
                    <th class="text-center">Quantity</th>
                    <th class="text-center">Action</th>
                </tr>
                @foreach ($Models as $Model)
                <tr>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{ $Model->Model_name }}</td>
                    <td>{{ $Model->Model_category }}</td>
                    <td class="text-center">{{ count($Model->Assets_total_disposal)}}</td>
                    <td class="text-center">
                        <a class="btn btn-info btn-sm" href="{{ route('disposal.show',$Model->id) }}">Details</a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>


@endsection