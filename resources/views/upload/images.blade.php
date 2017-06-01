<div class="row">
	<div class="col-md-12">
		<ul class="sortable" data-entityname="uploads">
			@foreach($uploads as $upload)
			<li data-itemId="{{$upload->id}}">
				<div class="thumbnail">
					<img src="{{asset($upload->thumbnail)}}">
					<a class="btn btn-sm btn-danger" href="{{route('admin.upload.destroy', $upload)}}" delete>
						<i class="glyphicon glyphicon-trash"></i>
					</a>
				</div>
			</li>
			@endforeach
		</ul>
	</div>
</div>