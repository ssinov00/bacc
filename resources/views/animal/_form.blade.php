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

<div class="form-group{{ $errors->has('type') ? ' has-error' : '' }}">
	{!! Form::label('type', 'Vrsta životinje *', ['class' => 'control-label']) !!}
	{!! Form::select('type',$type, null, ['class' => 'form-control','placeholder' => 'Odaberi vrstu']) !!}
	@if($errors->has('type'))
	<span class="help-block">
		<strong>{{ $errors->first('type') }}</strong>
	</span>
	@endif
</div>

<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
	{!! Form::label('name', 'Ime vrste *', ['class' => 'control-label']) !!}
	{!! Form::text('name', null, ['class' => 'form-control']) !!}
	@if($errors->has('name'))
	<span class="help-block">
		<strong>{{ $errors->first('name') }}</strong>
	</span>
	@endif
</div>

<div class="form-group{{ $errors->has('vet_station') ? ' has-error' : '' }}">
	{!! Form::label('vet_station', 'Veterinarska stanica *', ['class' => 'control-label']) !!}
	{!! Form::select('vet_station',array('vet1' => 'Vet1','vet2'=>'Vet2','vet3'=>'Vet3') , null, ['class' => 'form-control','placeholder' => 'Odaberi veterinara']) !!}
	@if($errors->has('vet_station'))
	<span class="help-block">
		<strong>{{ $errors->first('vet_station') }}</strong>
	</span>
	@endif
</div>

<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
	{!! Form::label('address', 'Adresa *', ['class' => 'control-label']) !!}
	{!! Form::text('address', null, ['class' => 'form-control']) !!}
	@if($errors->has('address'))
	<span class="help-block">
		<strong>{{ $errors->first('address') }}</strong>
	</span>
	@endif
</div>

<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
	{!! Form::label('city', 'Grad *', ['class' => 'control-label']) !!}
	{!! Form::text('city', null, ['class' => 'form-control']) !!}
	@if($errors->has('city'))
	<span class="help-block">
		<strong>{{ $errors->first('city') }}</strong>
	</span>
	@endif
</div>

<div class="form-group{{ $errors->has('region') ? ' has-error' : '' }}">
	{!! Form::label('region', 'Županija *', ['class' => 'control-label']) !!}
	{!! Form::select('region',$region, null, ['class' => 'form-control','placeholder' => 'Odaberi županiju']) !!}
	@if($errors->has('region'))
	<span class="help-block">
		<strong>{{ $errors->first('region') }}</strong>
	</span>
	@endif
</div>

<div class="form-group{{ $errors->has('sex') ? ' has-error' : '' }}">
	{!! Form::label('sex', 'Spol *', ['class' => 'control-label']) !!}
	{!! Form::select('sex',array('musko' => 'Muško','zensko'=>'Žensko') , null, ['class' => 'form-control','placeholder' => 'Odaberi spol']) !!}
	@if($errors->has('sex'))
	<span class="help-block">
		<strong>{{ $errors->first('sex') }}</strong>
	</span>
	@endif
</div>

<div class="form-group{{ $errors->has('age') ? ' has-error' : '' }}">
	{!! Form::label('age', 'Dob *', ['class' => 'control-label']) !!}
	{!! Form::text('age', null, ['class' => 'form-control']) !!}
	@if($errors->has('age'))
	<span class="help-block">
		<strong>{{ $errors->first('age') }}</strong>
	</span>
	@endif
</div>

<div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
	{!! Form::label('description', 'Dodatno o životinji *', ['class' => 'control-label']) !!}
	{!! Form::textarea('description', null, ['class' => 'form-control']) !!}
	@if($errors->has('description'))
	<span class="help-block">
		<strong>{{ $errors->first('description') }}</strong>
	</span>
	@endif
</div>

<div class="form-group">
	{!! Form::submit('Spremi', ['class' => 'btn btn-primary']) !!}
	{!! link_to_route('admin.animal.index', 'Natrag', null, ['class' => 'btn btn-default']) !!}
</div>

@section('styles')
<style type="text/css">
	#image-holder{
		background-image: url('{{asset($animal->image)}}');
		background-size: 100% 100%;
	}
</style>
@endsection



