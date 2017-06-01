@extends('layouts.admin')

@section('header')
Novosti / Novi unos
@endsection

@section('content')
{!! Form::open(['route' => 'admin.post.store', 'files' => true]) !!}
@include('post._form')
{!! Form::close() !!}
@endsection