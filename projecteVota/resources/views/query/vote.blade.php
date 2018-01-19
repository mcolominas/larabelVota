@section('head')
	@parent
	<script type="text/javascript" src="{{ URL::asset('js/animacionPreguntas.js') }}"></script>
@stop

@section('title')
	Projecte Vota - Inicio
@stop

@extends('layouts.master')

@section('content')

    <h2 class="cardTitle">Votar Encuesta</h2>
	<div class="cardContent">
		<h1>Nombre Encuesta</h1>
		<h3>Descripcion Encuesta</h3>

		<form class="animacionDesplegar" action="../php/votarEncuesta.php" method="post">
			<p>tipo1</p>
			<input type="checkbox" name="respuestas[]" value="idOpcion">Opcion 1</input><br>
			<input type="checkbox" name="respuestas[]" value="idOpcion">Opcion 2</input><br>
			<input type="checkbox" name="respuestas[]" value="idOpcion" checked>Opcion 3</input><br>
			<input type="checkbox" name="respuestas[]" value="idOpcion">Opcion 4</input><br>

			<p>tipo2</p>
			<input type="radio" name="respuestas[]" value="idOpcion">Opcion 1</input><br>
			<input type="radio" name="respuestas[]" value="idOpcion">Opcion 2</input><br>
			<input type="radio" name="respuestas[]" value="idOpcion" checked>Opcion 3</input><br>
			<input type="radio" name="respuestas[]" value="idOpcion">Opcion 4</input><br>

			<input type="submit" value="Votar">
		</form>
	</div>

@stop