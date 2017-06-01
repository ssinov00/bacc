@extends('layouts.admin')

@section('header')
Životinje / Novi unos
@endsection

@section('content')
{!! Form::open(['route' => 'admin.animal.store', 'files' => true]) !!}
@include('animal._form')
{!! Form::close() !!}
@endsection