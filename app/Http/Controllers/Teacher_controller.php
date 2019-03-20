<?php

namespace App\Http\Controllers\API\v1\Users;
use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Course;
use App\Teacher;
use App\Http\Requests\Validation_Teacher;



class Teacher_controller extends Controller
{
    public function __construct(){

		$this->middleware('auth');

	} // to keep safe the tab in methods get, post etc.


	private $path ='user';






		public function register_teacher(){
				//donde yo veo el formulario de cadastro para registrar
			 	$show_course = Course::all();
			 	return view('register_teacher',compact('show_course'));
			 	
		}


		public function saving_teacher(Request $request){

				$saving_teacher = new Teacher;
				$saving_teacher->name = $request->get('name');
				$saving_teacher->surname = $request->get('surname');
				$saving_teacher->age = $request->get('age');
				$saving_teacher->profession = $request->get('profession');
				$saving_teacher->course_id = $request->get('category');
				$saving_teacher->save();

				return redirect('register_teacher')->with('success','Usuario Cadastrado com êxito');


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


} // Fin of the class controller
