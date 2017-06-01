<div class="row">
	<div class="col-md-12">
		<table class="table table-striped table-hover">
			<tbody class="sortable" data-entityname="uploads">
				@foreach ($uploads as $upload)
				<tr data-itemId="{{$upload->id}}">
					<td><span class="glyphicon glyphicon-sort"></span></td>
					<td>{{$upload->name}}</td>
                    <td><a class="btn btn-sm btn-danger" href="{{route('admin.upload.destroy', $upload)}}" delete><i class="glyphicon glyphicon-trash"></i></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>