<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class leafletController extends Controller
{
   function show(){
      $table = DB::table('leaflet')->orderBy('status', 'desc')->get();
      return view("leaflet.status", ["s" => $table]);
   }
}

