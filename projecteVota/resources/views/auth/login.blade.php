@section('title')
  Projecte Vota - Login
@stop

@extends('layouts.master')

@section('content')

   <h2 class="cardTitle">Login</h2>
    <div class="cardContent">
        <form action="../php/auth/login.php" method="POST">
          <input type="text" name="email" placeholder="Email" required><br>
          <input type="password" name="password" placeholder="Contraseña" required><br>
          
          <!--<a href="recuperarPassword.php">Has olvidado tu contraseña?</a><br>-->
          <input type="submit" name="login" value="Entrar" required>
        </form>
    </div>

@stop