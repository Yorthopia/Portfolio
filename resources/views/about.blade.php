@extends('layouts.default')
@section('about')
<div class="home">
	<p class="wellcome">Hi, I am </p>
	<p class="wellcome 2nd">Christophe Aupet<p>
	<p class="wellcome 3rd">Junior Web Developer</p>
</div>
<div class="about">
	<h2>About me</h2>
	<ul>
		<li><span>First Name :</span> Christophe</li>
		<li><span>Name :</span> Aupet</li>
		<li><span>Age :</span> {{ $age->y }}</li>
		<li><span>Adresse :</span> 15 rue des pierrelais 92320 Châtillon</li>
		<li><span>Country :</span> France</li>
		<li><span>Phone :</span> 06.12.21.02.56</li>
		<li><span>Mail :</span> christophe.aupet@gmail.com</li>
	</ul>
</div>
@stop