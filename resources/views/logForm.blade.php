@extends('layouts.default')
@section('content')
<div class="form-wrapper">
	{!! Form::open(['url' => 'auth']) !!}
	<div class="form-group">
	{!! Form::label('login', 'Please enter your login :', ['class' => 'form-control']) !!}
		{!! Form::text('login', false, ['class' => 'form-control']) !!}
	</div>
	<div class="from-group">
		{!! Form::label('password', false, ['class' => 'form-control']) !!}
		{!! Form::password('password', false, ['class' => 'form-control']) !!}
	</div>
	{!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
	<a href="{{ url('/') }}">go to the cube</a>
</div>
@stop