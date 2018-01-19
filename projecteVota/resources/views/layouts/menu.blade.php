<ul id="menu">
	<li> {{-- Lado izquierdo --}} 
		<ul>
			<li><span>Menú:</span></li>
			<li><a class="{{ Request::is('/') ? 'active' : ''}}" href="{{url('/')}}">Inicio</a></li>

			{{-- Usuario ADMIN --}}
			<li><a class="{{ Request::is('query/create') ? 'active' : ''}}" href="{{url('/query/create')}}">Crear una encuesta</a></li>
			<li><a class="{{ Request::is('myQueries') ? 'active' : ''}}" href="{{url('/myQueries')}}">Ver mis Encuestas</a></li>
			{{-- Usuario NORMAL --}}
			<li><a class="{{ Request::is('query') ? 'active' : ''}}" href="{{url('/query')}}">Votar encuestas</a></li>
		</ul>
	</li>
	<li> {{-- Lado derecho --}}
		{{-- Usuario logeado --}}
		<ul>
			<li class="dropdown">
				<input type="radio" id="submenu1">
				<label for="submenu1" class="">Correo electronico <i class="fa fa-caret-down"></i></label>
				<div>
					<a class="" href="#">Perfil</a>
					<a class="" href="#">Cambiar Contraseña</a>
					<a href="{{url('/logout')}}">Cerrar Sessión</a>
				</div>
			</li>

			{{-- Usuario NO logeado --}}
			<li><a class="{{ Request::is('login') ? 'active' : ''}}" href="{{url('/login')}}">Login</a></li>
			<li><a class="{{ Request::is('register') ? 'active' : ''}}" href="{{url('/register')}}">Registrase</a></li>
		</ul>
	</li>
</ul>
