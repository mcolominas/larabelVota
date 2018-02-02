<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Encuesta;
use App\OpcionesEncuesta;
use App\VotosEncuesta;
use App\AccesoEncuesta;

class EncuestaController extends Controller
{
    function getIndex(){
    	return view('query.index');
    }

    function getMyQueries(){
        $encuestas = Encuesta::all();
    	return view('query.myQueries', array("encuestas" => $encuestas));
    }

    function getVote($id){
    	return view('query.vote');
    }

    function getCreate(){
    	return view('query.create');
    }

    function getEdit($id){
        $encuesta = Encuesta::where('idEncuesta', '=', $id)->firstOrFail();
        $opciones = OpcionesEncuesta::where('idEncuesta', '=', $encuesta->idEncuesta)->get();
        $invitados = AccesoEncuesta::where('idEncuesta', '=', $encuesta->idEncuesta)->get();
        $cantVotosTotales = 0;
        $cantVotosOpciones = array();

        foreach ($opciones as $opcion) {
            $cantVotosTotales += VotosEncuesta::where('idOpcion', '=', $opcion->idOpcion)->count();
        }
        foreach ($opciones as $opcion) {
            $cantVotos = VotosEncuesta::where('idOpcion', '=', $opcion->idOpcion)->count();
            $cantVotosOpciones["$opcion->idOpcion"] = array("cantVotos" => $cantVotos, 
                                                            "porcentaje" => round($cantVotos === 0 ? 0 : $cantVotos/$cantVotosTotales*100, 2));
        }

    	return view('query.edit', array(
                                        "encuesta" => $encuesta, 
                                        "opciones" => $opciones, 
                                        "cantVotosTotales" => $cantVotosTotales,
                                        "cantVotosOpciones" => $cantVotosOpciones,
                                        "invitados" => $invitados));
    }

    function createEncuesta(Request $request){
        $pregunta = $request->input('pregunta');
        $descripcion = $request->input('descripcion');
        $multirespuesta = strcmp($request->input('multirespuesta'), "si") === 0 ? 1 : 0;
        $diaInicio = $request->input('diaInicio');
        $mesInicio = $request->input('mesInicio');
        $anyInicio = $request->input('anyInicio');
        $horaInicio = $request->input('horaInicio');
        $diaFin = $request->input('diaFin');
        $mesFin = $request->input('mesFin');
        $anyFin = $request->input('anyFin');
        $horaFin = $request->input('horaFin');
        $res1 = $request->input('res1');
        $res2 = $request->input('res2');

        $encuesta = new Encuesta;
        $encuesta->idUsuario = 100;
        $encuesta->nombre = $pregunta;
        $encuesta->multirespuesta = $multirespuesta;
        if($descripcion !== null) $encuesta->descripcion = $descripcion;
        $encuesta->inicio = "$anyInicio-$mesInicio-$diaInicio $horaInicio:00:00";
        $encuesta->fin = "$anyFin-$mesFin-$diaFin $horaFin:00:00";
        $encuesta->save();

        $idEncuestaInsert = $encuesta->id;

        $num = 1;
        while(($respuesta = $request->input('res'.$num)) !== null){
            $num++;
            $opcionesEncuesta = new OpcionesEncuesta;
            $opcionesEncuesta->idEncuesta = $idEncuestaInsert;
            $opcionesEncuesta->nombre = $respuesta;
            $opcionesEncuesta->save();
        }
        return $num;
    }
}
