@extends('layouts.admin')

@section('header')
Novosti
@endsection

@section('content')
<table class="table table-striped">
	<thead>
		<tr>
			<th>Naslov</th>
			<th>Datum</th>
			<th>Istaknuto</th>
			<th>Opcije</th>
		</tr>
	</thead>
</table>
@endsection

@section('scripts')
<script>
	$(function() {
		$('table').DataTable({
			ajax: '{!! route('admin.post.data') !!}',
			order: [[1, 'desc']],
			columns: [
			{ data: 'title', name: 'title' },
			{ data: 'date', name: 'date' },
			{
				data:   'featured',
				searchable: false,
				render: function ( data, type, row ) {                
					return data == true ? '<i class="fa fa-check"></i>' : null;
				}
			},
			{ data: 'options', name: 'options', sortable: false, searchable: false, className: 'text-right' }
			]
		});
		$('#create').html('<a class="btn btn-success" href="{{ route('admin.post.create') }}"><i class="glyphicon glyphicon-plus"></i> Novi unos</a>');
	});
</script>
@endsection