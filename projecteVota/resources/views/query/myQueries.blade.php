@section('title')
	Projecte Vota - Ver mis encuestas
@stop

@extends('layouts.master')

@section('content')

    <h2 class="cardTitle">Mis Encuestas</h2>
	<div class="cardContent">

	<ul class='noIconos'>
		@foreach ($encuestas as $encuesta)
			<li><a href='{{url("/query/edit/$encuesta->idEncuesta")}}'>{{ $encuesta->nombre }}</a></li>
		@endforeach
	</ul>
	</div>

@stop