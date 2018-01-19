@section('title')
	Projecte Vota - Inicio
@stop

@extends('layouts.master')

@section('content')

    <h2 class="cardTitle">Información sobre la encuesta</h2>
	<div class="cardContent">
		<h1>Encuesta 1</h1>
		<h3>Descripcion</h3>
				<table>
					<tr>
						<th colspan='3'>Numero total de votos: XXX</th>
					</tr>
					<tr>
						<th>Respuesta</th>
						<th>Cantidad de votos</th>
						<th>Porcentaje de votos</th>
					</tr>
					<tr>
						<td>XXX</td>
						<td>XXX</td>
						<td>XXX</td>
					</tr>
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
			<li>Correo invitados</li>
		</ul>
	</div>

@stop