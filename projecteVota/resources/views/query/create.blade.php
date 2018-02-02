@section('head')
	@parent
	<script type="text/javascript" src="{{ URL::asset('js/validacionEncuesta.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/error.css') }}" />
@stop

@section('title')
	Projecte Vota - Crear encuesta
@stop

@extends('layouts.master')

@section('content')

    <h2 class="cardTitle">Crear Encuestas</h2>
	<div class="cardContent">
		<button id="generarForm" type="button">Generar el formulario</button>
		<form action="{{url('/query/create')}}" method="POST">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
		</form>
	</div>

@stop