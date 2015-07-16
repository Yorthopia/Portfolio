@extends('layouts.templateAdmin')
@section('content')
@foreach($educ as $value)
<div class="admin-items">
	<p>{{ $value->title }}</p>
	<p>{{ $value->env }}</p>
	<p>{{ $value->description }}</p>
	<p>{{ $value->date }}</p>
</div>
<a href="{{ url('admin/educ/'.$value->id) }}">update</a>
<a href="{{ url('delete/educ/'.$value->id) }}">delete</a>
@endforeach
<div class="form-wrapper line">
	<p>Add experience</p>
	{!! Form::open(['url' => 'add/educ', 'class' => 'form-inline']) !!}
	<div class="form-group">
		{!! Form::label('title', 'Please enter a title :', ['class' => 'form-control']) !!}
		{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'job']) !!}
	</div>
	<div class="from-group">
		{!! Form::label('env', 'Please enter a society :', ['class' => 'form-control']) !!}
		{!! Form::text('env', null, ['class' => 'form-control', 'placeholder' => 'society']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('description', 'Please enter an experience decription :', ['class' => 'form-control']) !!}
		{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'experience description']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('date', 'Please enter a duration :', ['class' => 'form-control']) !!}
		{!! Form::text('date', null, ['class' => 'form-control', 'placeholder' => '1 month']) !!}
	</div>
	{!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
</div>
@stop