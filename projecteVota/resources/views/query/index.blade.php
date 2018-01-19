@section('title')
	Projecte Vota - Inicio
@stop

@extends('layouts.master')

@section('content')

	<h2 class="cardTitle">Encuestas no votadas</h2>
	<div class="cardContent">
		<ul class="noIconos">
			<li><a href='{{url("/query/vote/1")}}'>Encuesta 1</a></li>
			<li><a href='{{url("/query/vote/2")}}'>Encuesta 2</a></li>
		</ul>
		</div>
		<h2 class="cardTitle">Encuestas votadas</h2>
		<div class="cardContent">
		<ul class="noIconos">
			<li><a href='{{url("/query/vote/3")}}'>Encuesta 3</a></li>
			<li><a href='{{url("/query/vote/4")}}'>Encuesta 4</a></li>
		</ul>
	</div>

@stop