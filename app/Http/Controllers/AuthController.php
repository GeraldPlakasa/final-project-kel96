<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
   public function Form()
   {
   	return view("form");
   }

   public function Welcome(Request $request){
   	$fname = $request["fname"];
   	$lname = $request["lname"];

   	echo "<h1>SELAMAT DATANG $fname $lname!</h1>";
   	return view("selamatdatang");
   }
}
