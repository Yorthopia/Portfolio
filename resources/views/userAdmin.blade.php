@extends('layouts.templateAdmin')
@section('content')
<div class="form-wrapper">
	<p>User info</p>
	{!! Form::open(['url' => 'up/user']) !!}
	<div class="form-group">
		{!! Form::label('login', 'Please enter your login :', ['class' => 'form-control']) !!}
		{!! Form::text('login', null, ['class' => 'form-control', 'placeholder' => $user->login]) !!}
	</div>
	<div class="from-group">
		{!! Form::label('password', null, ['class' => 'form-control']) !!}
		{!! Form::text('password', null, ['class' => 'form-control']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('email', null, ['class' => 'form-control']) !!}
		{!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => $user->email]) !!}
	</div>
	<div class="form-group">
		{!! Form::label('adresse', null, ['class' => 'form-control']) !!}
		{!! Form::textarea('adresse', null, ['class' => 'form-control', 'placeholder' => $user->adresse]) !!}
	</div>
	{!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
</div>
@stop