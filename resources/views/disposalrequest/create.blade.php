@extends('template')

@section('content')
<div class="card-header pb-0">
    <div class="row">
        <div class="col-lg-6 col-7">
            <h6>List Asset </h6>
        </div>
    </div>
    <div class="card-body px-0 pb-2">
        <div class="table-responsive">
            <table class="table align-items-center mb-0">
                <tr>
                    <th class="text-center">No</th>
                    <th>Model</th>
                    <th>Category</th>
                    <th class="text-center">Exp. Quantity</th>
                    <th class="text-center">Action</th>
                </tr>
                @foreach ($Models as $Model)
                <tr>
                    <?php
                        $total_dis = 0;
                        $total_broke = isset($Model->Assets_broke) ? (int)count($Model->Assets_broke) : 0;
                        $total_exp = (int)count($Model->Asset_dis);
                        $total_dis  = ($total_broke + $total_exp) ;
                    ?>
                    <td class="text-center">{{$loop->iteration}}</td>
                    <td>{{ $Model->Model_name }}</td>
                    <td>{{ $Model->Model_category }}</td>
                    <td class="text-center">{{count($Model->Total_dis)}} </td>
                    <td class="text-center">
                        @if( count($Model->Total_dis)  >= 100)
                            {{-- create disposal --}}
                            <a class="btn btn-warning btn-sm" href="{{ route('disposalrequest.show',$Model->id) }}">Details</a>
                        @elseif (count($Model->Total_dis) > 0)
                            <a class="btn btn-info btn-sm" href="{{ route('disposalrequest.show',$Model->id) }}">Review</a>
                        @endif
                            
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>


@endsection