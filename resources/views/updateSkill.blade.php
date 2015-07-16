@extends('layouts.templateAdmin')
@section('content')
<div class="form-wrapper line">
	<p>Skill info</p>
	{!! Form::open(['url' => 'up/skill/'.$skill->id, 'class' => 'form-inline']) !!}
	<div class="form-group">
		{!! Form::label('type', 'Please enter the type of skill :', ['class' => 'form-control']) !!}
		{!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => $skill->type]) !!}
	</div>
	<div class="from-group">
		{!! Form::label('skill_value', 'Please enter a value :', ['class' => 'form-control']) !!}
		{!! Form::text('skill_value', null, ['class' => 'form-control', 'placeholder' => $skill->skill_value]) !!}
	</div>
	<div class="form-group">
		{!! Form::label('master', 'Please enter a mastering decription :', ['class' => 'form-control']) !!}
		{!! Form::text('master', null, ['class' => 'form-control', 'placeholder' => $skill->master]) !!}
	</div>
	{!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
</div>
<a href="{{ url('admin/skill') }}">Return to skill pannel</a>
@stop