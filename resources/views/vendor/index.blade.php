@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>List Vendor</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('vendor.create') }}">Tambah Vendor Baru</a>
                <a class="btn btn-success" href="{{ route('contract.create') }}">Tambah Contract Baru</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th width="280px"class="text-center">Nama</th>
            <th width="280px"class="text-center">Phone</th>
            <th width="480px"class="text-center">Alamat</th>
            <th width="480px"class="text-center">Bank</th>
            <th width="480px"class="text-center">Bank Account</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($vendors as $vendor)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{ $vendor->Vendor_name }}</td>
            <td>{{ $vendor->Vendor_phone }}</td>
            <td>{{ $vendor->Vendor_address }}</td>
            <td>{{ $vendor->Vendor_bank_acc }}</td>
            <td>{{ $vendor->Vendor_account }}</td>
            <td class="text-center">
                <a class="btn btn-primary btn-sm" href="{{ route('vendor.edit',$vendor->id) }}">Edit</a>
                <a class="btn btn-info btn-sm" href="{{ route('vendor.show',$vendor->id) }}">Contract</a>
                {{-- <form action="{{ route('pegawai.destroy',$pegawai->id) }}" method="POST"> --}}

                   {{-- <a class="btn btn-info btn-sm" href="{{ route('pegawai.show',$pegawai->id) }}">Details</a> --}}

                    

                    {{-- @csrf --}}
                    {{-- @method('DELETE') --}}

                    {{-- <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button> --}}
                {{-- </form> --}}
            </td>
        </tr>
        @endforeach
    </table>


@endsection