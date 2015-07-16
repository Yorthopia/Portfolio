@extends('layouts.templateAdmin')
@section('content')
@foreach($project as $value)
<div class='admin-project'>
	<p>{{ $value->title }}</p>
	<img src="{{ URL::asset('storage/'.$value->file_name) }}" alt="project page" class="admin-img">
	<p>{{ $value->description }}</p>
	<a href="{{ url('admin/project/'.$value->id) }}">update</a>
	<a href="{{ url('delete/project/'.$value->id) }}">delete</a>
</div>
@endforeach
<div class="form-wrapper line right">
	<p>add Project</p>
	{!! Form::open(['url' => 'add/project', 'class' => 'form-inline', 'files' => true]) !!}
	<div class="form-group">
		{!! Form::label('title', 'Please enter the title of project :', ['class' => 'form-control']) !!}
		{!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'my_website']) !!}
	</div>
	<div class="from-group">
		{!! Form::label('file', 'Please enter a picture :', ['class' => 'form-control']) !!}
		{!! Form::file('file') !!}
	</div>
	<div class="form-group">
		{!! Form::label('description', 'Please enter a project decription :', ['class' => 'form-control']) !!}
		{!! Form::textarea('description', null, ['class' => 'form-control', 'placeholder' => 'project description']) !!}
	</div>
	{!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
	{!! Form::close() !!}
</div>
@stop