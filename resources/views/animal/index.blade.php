@extends('layouts.admin')

@section('header')
Životinje
@endsection

@section('content')
<table class="table table-striped">
	<thead>
		<tr>
			<th>Ime</th>
			<th>Vrsta</th>
			<th>Opcije</th>
		</tr>
	</thead>
</table>
@endsection

@section('scripts')
<script>
	$(function() {
		$('table').DataTable({
			ajax: '{!! route('admin.animal.data') !!}',
			columns: [
			{ data: 'name', name: 'name' },
			{ data: 'type', name: 'type' },
			{ data: 'options', name: 'options', sortable: false, searchable: false, className: 'text-right' }
			]
		});
		$('#create').html('<a class="btn btn-success" href="{{ route('admin.animal.create') }}"><i class="glyphicon glyphicon-plus"></i> Novi unos</a>');
	});
</script>
@endsection