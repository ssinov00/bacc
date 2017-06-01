@extends('layouts.admin')

@section('header')
Novosti / Uredi #{{$animal->id}}
@endsection

@section('content')
<div class="tab-wrapper tab-primary">
	<ul class="nav nav-tabs">
		<li class="active"><a href="#details" data-toggle="tab">Detalji</a></li>
		<li><a href="#images" data-toggle="tab">Galerija</a></li>
	</ul>
	<div class="tab-content">
		<!-- Details -->    
		<div class="tab-pane active" id="details">
			{!! Form::model($animal, ['method' => 'PUT', 'route' => ['admin.animal.update', $animal], 'files' => true]) !!}
			@include('animal._form')
			{!! Form::close() !!}  
		</div>
		<!-- Images -->
		<div class="tab-pane" id="images">
			<!-- jQuery File Upload -->
			<!-- The fileinput-button span is used to style the file input field as button -->
			<span class="btn btn-success fileinput-button">        
				<i class="glyphicon glyphicon-plus"></i>
				<span>Odaberite slike</span>
				<!-- The file input field used as target for the file upload widget -->
				<input type="file" name="file" class="fileupload" data-url="{{route('admin.upload.store')}}" data-form-data='{"model": "animal", "id": {{$animal->id}}}' multiple>
			</span>
			<br>
			<br>
			<!-- The global progress bar -->
			<div id="progress" class="progress">
				<div class="progress-bar progress-bar-success"></div>
			</div>
			@include('upload.images', ['uploads' => $animal->images])
		</div>
		
	</div>
</div>
@endsection