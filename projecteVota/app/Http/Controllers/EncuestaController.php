<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    function getIndex(){
    	return view('query.index');
    }

    function getMyQueries(){
    	return view('query.myQueries');
    }

    function getVote($id){
    	return view('query.vote');
    }

    function getCreate(){
    	return view('query.create');
    }

    function getEdit($id){
    	return view('query.edit');
    }
}
