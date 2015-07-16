@extends('layouts.templateAdmin')
@section('content')
<h2>welcome to your admin pannel {{ ucwords(Auth::user()->login) }}</h2>
@stop