<?php
namespace App\Http\Controllers\API\v1\Users;
use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Course;
use App\Http\Requests\Save_Course;



//use Illuminate\Http\Request;

class Course_controler extends Controller
{
    public function __construct(){

	$this->middleware('auth');

} // to keep safe the tab in methods get, post etc.


private $path ='user';


public function show_course(){
	    
		$show_course = Course::all();
		return view('show_course',compact('show_course'));
	}



public function register_course(){
		//donde yo veo el formulario de cadastro para registrar
	 	return view('register_course');
	 	
	}


public function saving_course(Save_Course $request){

		$save_course = new Course;
		$save_course->name = $request->get('name');
		$save_course->save();

		return redirect('/show_course')->with('success','Usuario Cadastrado com êxito');


}



public function edit_course(Request $request, $id){
		// para editar los datos sin guardar aun
		$edit_course = Course::find($id);
		return view('edit_course',compact('edit_course'));

	}


public function update_course(Request $request, $id){
		$update_course = Course::find($id);
		$update_course->name = $request->get('name');
		$update_course->save();

         return redirect('/show_course')->with('success','Usuario atualizados com êxito');
	}



public function delete_course(Request $request, $id){
		$delete_course = Course::find($id);
		$delete_course->delete();
        return redirect('/show_course')->with('deleted','Curso elminado com êxito'.":".$delete_course->name);
	}


}// FIN of the class Course_controller
