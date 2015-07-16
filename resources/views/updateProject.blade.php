@extends('layouts.templateAdmin')
@section('content')
<div class="form-wrapper line right">
	<p>add Project</p>
	{!! Form::open(['url' => 'up/project/'.$project->id, 'class' => 'form-inline', 'files' => true]) !!}
	<div class="form-group">
		{!! Form::label('title', 'Please enter the title of project :', ['class' => 'form-control']) !!}
		{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => $project->title]) !!}
	</div>
	<div class="from-group">
		{!! Form::label('file', 'Please enter a picture :', ['class' => 'form-control']) !!}
		{!! Form::file('file') !!}
	</div>
	<div class="form-group">
		{!! Form::label('description', 'Please enter a project decription :', ['class' => 'form-control']) !!}
		{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => $project->description]) !!}
	</div>
	{!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
</div>
<a href="{{ action('PagesController@projectPannel') }}">return to project pannel</a>
@stop