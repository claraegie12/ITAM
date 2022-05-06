@extends('layouts.app')

@section('content')
    
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>List Branch</h2>
            </div>
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('branch.create') }}">Tambah Branch Baru</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('succes'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

		<table id="dataTable" class="table table-bordered">
				<thead>
						<tr>
								<th>No</th>
								<th>Nama</th>
								<th>Phone</th>
								<th>Alamat</th>
								<th>Action</th>
						</tr>
				</thead>
				<tbody>
				</tbody>
		</table>

@endsection

@push('scripts')
	<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
	<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
	<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
    $(document).ready(function() { 
			var table = $('#dataTable').DataTable({
              processing: true,
              serverSide: true,
              ajax: "{{ route('branch.list') }}",
              columns: [
                  {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                  {data: 'Name', name: 'Name'},
                  {data: 'Phone', name: 'Phone'},
									{data: 'Alamat', name: 'Alamat'},
                  {
                      data: 'action', 
                      name: 'action', 
                      orderable: true, 
                      searchable: true
                  },
              ]
          });
    });
	</script>
@endpush