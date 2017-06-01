<div class="row">
	<div class="col-md-6">        
		<div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
			<div id="image-holder" class="form-control"></div>
			@if($errors->has('image'))
			<span class="help-block">
				<strong>{{ $errors->first('image') }}</strong>
			</span>
			@endif
		</div>
		<div class="form-group">
			<span class="btn btn-success fileinput-button">        
				<i class="glyphicon glyphicon-plus"></i>
				<span>Odaberite glavnu sliku</span>
				{!! Form::file('image', ['id' => 'fileUpload']) !!}
			</span>
		</div>
	</div>
</div>

<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
	{!! Form::label('title', 'Naziv *', ['class' => 'control-label']) !!}
	{!! Form::text('title', null, ['class' => 'form-control']) !!}
	@if($errors->has('title'))
	<span class="help-block">
		<strong>{{ $errors->first('title') }}</strong>
	</span>
	@endif
</div>
<div class="form-group{{ $errors->has('summary') ? ' has-error' : '' }}">
	{!! Form::label('summary', 'Sažetak *', ['class' => 'control-label']) !!}
	{!! Form::textarea('summary', null, ['class' => 'form-control']) !!}
	@if($errors->has('summary'))
	<span class="help-block">
		<strong>{{ $errors->first('summary') }}</strong>
	</span>
	@endif
</div>
<div class="form-group{{ $errors->has('date') ? ' has-error' : '' }}">
	{!! Form::label('date', 'Datum *', ['class' => 'control-label']) !!}
	{!! Form::text('date', null, ['class' => 'form-control datepicker']) !!}
	@if($errors->has('date'))
	<span class="help-block">
		<strong>{{ $errors->first('date') }}</strong>
	</span>
	@endif
</div>
<div class="form-group">
	{!! Form::submit('Spremi', ['class' => 'btn btn-primary']) !!}
	{!! link_to_route('admin.post.index', 'Natrag', null, ['class' => 'btn btn-default']) !!}
</div>

@section('styles')
<style type="text/css">
	#image-holder{
		background-image: url('{{asset($post->image)}}');
		background-size: 100% 100%;
	}
</style>
@endsection