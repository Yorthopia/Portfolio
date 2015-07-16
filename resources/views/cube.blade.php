@extends('layouts.default')
@section('content')
<div class="hidden front-side">
	<p class="nav-button top-side-info"><span class="glyphicon glyphicon-arrow-up"></span> Cube view</p>
	<p class="nav-button left-side-info"><span class="glyphicon glyphicon-arrow-left"></span> Skills</p>
	<p class="nav-button right-side-info E-E">Experience-Education <span class="glyphicon glyphicon-arrow-right"></span></p>
	<p class="nav-button bottom-side-info"><span class="glyphicon glyphicon-arrow-down"></span> Contact</p>
	<div class="wellcome">
		<p>Hello I am Christophe Aupet</p>
		<p>Junior Web Developer</p>
	</div>	
	<div class="about">
		<h2>About me</h2>
		<ul>
			<li><p>First name : <span id="fname">{{ ucwords($user->fname) }}</span></p></li>
			<li><p>Last name : <span id="lname">{{ ucwords($user->lname) }}</span></p></li>
			<li><p>Age : <span id="age">{{ $age->y }}</span></p></li>
			<li><p>Adresse : <span id="adresse">{{ $user->adresse }}</span></p></li>
			<li><p>Nationality : <span id="nationality">{{ ucwords($user->nationality) }}</span></p></li>
		</ul>
	</div>
</div>
<div class="hidden left-side">
	<div class="skills">
		<p class="nav-button top-side-info"><span class="glyphicon glyphicon-arrow-up"></span> Cube View</p>
		<p class="nav-button left-side-info"><span class="glyphicon glyphicon-arrow-left"></span> Project</p>
		<p class="nav-button right-side-info">Wellcome <span class="glyphicon glyphicon-arrow-right"></span></p>
		<p class="nav-button bottom-side-info"><span class="glyphicon glyphicon-arrow-down"></span> Contact</p>
		<h2 id="skill-title">Skills</h2>
		<div class="skill-container">
			@foreach ($user->skill as $value)
			<div class="stat {{ $value->type }}-stat">
				<p id="{{ strtolower($value->type) }}">{{ strtoupper($value->type) }}</p>
				<ul class="meter {{ $value->type }}-skill">
					<li class="@if($value->skill_value >= 100) {{ "on" }} @endif"><span class="skill-level green"></span></li>
					<li class="@if($value->skill_value >= 90) {{ "on" }} @endif"><span class="skill-level green"></span></li>
					<li class="@if($value->skill_value >= 80) {{ "on" }} @endif"><span class="skill-level green"></span></li>
					<li class="@if($value->skill_value >= 70) {{ "on" }} @endif"><span class="skill-level green"></span></li>
					<li class="@if($value->skill_value >= 60) {{ "on" }} @endif"><span class="skill-level orange"></span></li>
					<li class="@if($value->skill_value >= 50) {{ "on" }} @endif"><span class="skill-level orange"></span></li>
					<li class="@if($value->skill_value >= 40) {{ "on" }} @endif"><span class="skill-level orange"></span></li>
					<li class="@if($value->skill_value >= 30) {{ "on" }} @endif"><span class="skill-level red"></span></li>
					<li class="@if($value->skill_value >= 20) {{ "on" }} @endif"><span class="skill-level red"></span></li>
					<li class="@if($value->skill_value >= 10) {{ "on" }} @endif"><span class="skill-level red"></span></li>
				</ul>
				<p>{{ ucwords($value->master) }}</p>
			</div>
			@endforeach
		</div>
	</div>
</div>
<div class="hidden bottom-side">
	<div class="bottom-content">
		<p class="nav-button top-side-info"><span class="glyphicon glyphicon-arrow-up"></span> Wellcome</p>
		<p class="nav-button left-side-info"><span class="glyphicon glyphicon-arrow-left"></span> Skills</p>
		<p class="nav-button right-side-info E-E">Experience-Education <span class="glyphicon glyphicon-arrow-right"></span></p>
		<p class="nav-button bottom-side-info"><span class="glyphicon glyphicon-arrow-down"></span> Project</p>
		<h2>Contact</h2>
		<div class="form-wrapper">
			<p>Send a message</p>
			{!! Form::open(['url' => 'send']) !!}
			<div class="form-group">
				{!! Form::label('mail_sender', 'Please enter your mail adresse :', ['class' => 'form-control']) !!}
				{!! Form::email('mail_sender', 'exlemple@gmail.com', ['class' => 'form-control']) !!}
			</div>
			<div class="from-group">
				{!! Form::label('mail_subject', false, ['class' => 'form-control']) !!}
				{!! Form::text('mail_subject', false, ['class' => 'form-control']) !!}
			</div>
			<div class="form-group">
				{!! Form::label('content', 'Enter your message here :', ['class' => 'form-control']) !!}
				{!! Form::textarea('content', false, ['class' => 'form-control']) !!}
			</div>
			{!! Form::submit('Send', ['class' => 'btn btn-primary']) !!}
			{!! Form::close() !!}
		</div>
	</div>
</div>
<div class="hidden right-side">
	<div class="right-content">
		<p class="nav-button top-side-info"><span class="glyphicon glyphicon-arrow-up"></span> Cube view</p>
		<p class="nav-button left-side-info"><span class="glyphicon glyphicon-arrow-left"></span> Wellcome</p>
		<p class="nav-button right-side-info">Project <span class="glyphicon glyphicon-arrow-right"></span></p>
		<p class="nav-button bottom-side-info"><span class="glyphicon glyphicon-arrow-down"></span> Contact</p>
		<div class="experience">
			<h2>Experience</h2>
			@foreach ($user->experience as $value)
			<ul>
				<li>{{ $value->title }}</li>
				<li>{{ $value->env }}</li>
				<li>{{ $value->date }}</li>
				<li>{{ $value->description }}</li>
			</ul>
			@endforeach
		</div>
		<div class="education">
			<h2>Education</h2>
			@foreach ($user->education as $value)
			<ul>
				<li>{{ $value->title }}</li>
				<li>{{ $value->env }}</li>
				<li>{{ $value->date }}</li>
				<li>{{ $value->description }}</li>
			</ul>
			@endforeach
		</div>
		<a class="dl" href="{{ URL::asset('doc/CURICULUM_VITAE.pdf') }}">Download my Curiculum Vitae</a>
	</div>
</div>
<div class="hidden back-side">
	<div class="back-content">
		<p class="nav-button top-side-info"><span class="glyphicon glyphicon-arrow-up"></span> Cube view</p>
		<p class="nav-button left-side-info"><span class="glyphicon glyphicon-arrow-left"></span> Experience-Education</p>
		<p class="nav-button right-side-info">Skill <span class="glyphicon glyphicon-arrow-right"></span></p>
		<p class="nav-button bottom-side-info"><span class="glyphicon glyphicon-arrow-down"></span> Contact</p>
		<h2>Project</h2>
		@foreach ($user->project as $value)
		<div class="aff-project">
			<p>{{ $value->title }}</p>
			<img src="{{ URL::asset('storage/'.$value->file_name) }}" alt="project picture">
			<p>{{ $value->description }}</p>
		</div>
		@endforeach
	</div>
</div>
@stop
@section('js')
<script type="text/javascript" src="{{ URL::asset('lib/sprite3d/sprite3D.js') }}"></script>
<script type="text/javascript" src="{{ url('jstest') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/script.js') }}"></script>
@stop