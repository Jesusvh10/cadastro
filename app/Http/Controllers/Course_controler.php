<?php
namespace App\Http\Controllers\API\v1\Users;
use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Illuminate\Http\Request;

//use Illuminate\Http\Request;

class Course_controler extends Controller
{
    public function __construct(){

	$this->middleware('auth');

} // to keep safe the tab in methods get, post etc.


private $path ='user';





public function cadastro(){
		//donde yo veo el formulario de cadastro para registrar
	 	return view('cadastro');
	 	
	}


































}// FIN of the class Course_controller
