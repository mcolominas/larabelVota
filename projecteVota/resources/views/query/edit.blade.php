@section('title')
	Projecte Vota - Editar encuesta
@stop

@extends('layouts.master')

@section('content')

    <h2 class="cardTitle">Información sobre la encuesta</h2>
	<div class="cardContent">
		<h1>{{ $encuesta->nombre }}</h1>
		@if( $encuesta->descripcion !== null )
			<h3>$encuesta->descripcion</h3>
		@endif
		<table>
			<tr>
				<th colspan='3'>Numero total de votos: {{ $cantVotosTotales }}</th>
			</tr>
			<tr>
				<th>Respuesta</th>
				<th>Cantidad de votos</th>
				<th>Porcentaje de votos</th>
			</tr>
			@foreach ($opciones as $opcion)
				<tr>
					<td>{{ $opcion->nombre }}</td>
					<td>{{ $cantVotosOpciones["$opcion->idOpcion"]["cantVotos"] }}</td>
					<td>{{ $cantVotosOpciones["$opcion->idOpcion"]["porcentaje"] }}%</td>
				</tr>
			@endforeach
		</table>
	</div>
	<h2 class="cardTitle">Invitar Usuarios</h2>
	<div class="cardContent">
		<form action="../php/invitarUsuarios.php" method="post">
			<div><label>Introduce el email de los usuarios separados por ;</label></div>
			<textarea name="invitados" cols="50" rows="6"></textarea>
			<div><input type="submit" value="Invitar"></div>
		</form>
	</div>
	<h2 class="cardTitle">Usuarios Invitados</h2>
	<div class="cardContent">
		
		<ul class="noIconos">
			@if( count($invitados) > 0 )
				@foreach ($invitados as $invitado)
					<li>{{ $invitado->idAcceso }}</li>
				@endforeach
			@else
				<li>No has invitado a nadie.</li>
			@endif
		</ul>
	</div>

@stop