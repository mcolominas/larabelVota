@section('title')
	Projecte Vota - Inicio
@stop

@extends('layouts.master')

@section('content')

    <h2 class="cardTitle">Registro</h2>
	<div class="cardContent">
		<form action="../php/auth/registro.php" method="POST">
			<input type="text" name="email" placeholder="Email" required><br>
			<input type="password" name="password" placeholder="Contraseña" required><br>
			<input type="password" name="passwordConfirm" placeholder="Confirmar contraseña" required><br>

			<input type="submit" name="registro" value="Registrarse">
		</form>
	</div>
@stop