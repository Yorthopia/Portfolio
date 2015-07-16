@extends('layouts.templateAdmin')
@section('content')
<div class="form-wrapper line">
	<p>update experience</p>
	{!! Form::open(['url' => 'up/exp/'.$exp->id, 'class' => 'form-inline']) !!}
	<div class="form-group">
		{!! Form::label('title', 'Please enter a title :', ['class' => 'form-control']) !!}
		{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => $exp->title]) !!}
	</div>
	<div class="from-group">
		{!! Form::label('env', 'Please enter a society :', ['class' => 'form-control']) !!}
		{!! Form::text('env', null, ['class' => 'form-control', 'placeholder' => $exp->env]) !!}
	</div>
	<div class="form-group">
		{!! Form::label('description', 'Please enter an experience decription :', ['class' => 'form-control']) !!}
		{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => $exp->description]) !!}
	</div>
	<div class="form-group">
		{!! Form::label('date', 'Please enter a duration :', ['class' => 'form-control']) !!}
		{!! Form::text('date', null, ['class' => 'form-control', 'placeholder' => $exp->date]) !!}
	</div>
	{!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
</div>
<a href="{{ url('admin/exp') }}">return to experiences pannel</a>
@stop