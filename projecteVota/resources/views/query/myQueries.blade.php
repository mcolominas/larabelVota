@section('title')
	Projecte Vota - Inicio
@stop

@extends('layouts.master')

@section('content')

    <h2 class="cardTitle">Mis Encuestas</h2>
	<div class="cardContent">

	<ul class='noIconos'>
	<li><a href='{{url("/query/edit/1")}}'>Mi encuesta 1</a></li>
	<li><a href='{{url("/query/edit/2")}}'>Mi encuesta 2</a></li>
	<li><a href='{{url("/query/edit/3")}}'>Mi encuesta 3</a></li>
	</ul>
	</div>

@stop