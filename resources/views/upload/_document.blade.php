<tr data-itemId="{{$upload->id}}">
	<td class="sortable-handle"><span class="glyphicon glyphicon-sort"></span></td>
	<td>{{$upload->name}}</td>
	<td><a class="btn btn-sm btn-danger" href="{{route('admin.upload.destroy', $upload)}}" delete><i class="glyphicon glyphicon-trash"></i></a></td>
</tr>