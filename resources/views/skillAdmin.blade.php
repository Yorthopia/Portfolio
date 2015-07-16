@extends('layouts.templateAdmin')
@section('content')
<div>
@foreach($skill as $value)
	<div class="admin-items">
		<p>{{ $value->type }}</p>
		<p>{{ $value->skill_value }}</p>
		<p>{{ $value->master }}</p>
	</div>
	<a href="{{ url('admin/skill/'.$value->id) }}">update</a>
	<a href="{{ url('delete/skill/'.$value->id) }}">delete</a>
@endforeach
</div>
<div class="form-wrapper line">
	<p>add Skill</p>
	{!! Form::open(['url' => 'add/skill', 'class' => 'form-inline']) !!}
	<div class="form-group">
		{!! Form::label('type', 'Please enter the type of skill :', ['class' => 'form-control']) !!}
		{!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'PHP']) !!}
	</div>
	<div class="from-group">
		{!! Form::label('skill_value', 'Please enter a value :', ['class' => 'form-control']) !!}
		{!! Form::text('skill_value', null, ['class' => 'form-control', 'placeholder' => '10-100']) !!}
	</div>
	<div class="form-group">
		{!! Form::label('master', 'Please enter a mastering decription :', ['class' => 'form-control']) !!}
		{!! Form::text('master', null, ['class' => 'form-control', 'placeholder' => 'mastering description']) !!}
	</div>
	{!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
</div>
@stop