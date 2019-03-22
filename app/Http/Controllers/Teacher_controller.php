<?php

namespace App\Http\Controllers\API\v1\Users;
use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Course;
use App\Teacher;
use App\Http\Requests\Validation_Teacher;
use DB;



class Teacher_controller extends Controller
{
    public function __construct(){

		$this->middleware('auth');

	} // to keep safe the tab in methods get, post etc.


	private $path ='user';



		public function show_teacher(){
			    
					
			$query = "teachers.id, teachers.name as namet, teachers.surname, teachers.age, teachers.profession, teachers.course_id, courses.name as curso";

			$teacher = DB::table('teachers')
			->select(DB::raw($query))
			->leftJoin('courses', 'courses.id', '=', 'teachers.course_id')
			->whereNull('teachers.deleted_at')
			->paginate(5);


			return view('show_teacher',compact('teacher'));
				
				
				
		}


		public function register_teacher(){
				//donde yo veo el formulario de cadastro para registrar
			 	$show_course = Course::all();
			 	return view('register_teacher',compact('show_course'));
			 	
		}


		public function saving_teacher(Validation_Teacher $request){

				$saving_teacher = new Teacher;
				$saving_teacher->name = $request->get('name');
				$saving_teacher->surname = $request->get('surname');
				$saving_teacher->age = $request->get('age');
				$saving_teacher->profession = $request->get('profession');
				$saving_teacher->course_id = $request->get('category');
				$saving_teacher->save();

				return redirect('show_teacher')->with('success','Usuario Cadastrado com êxito');


		}



		public function edit_teacher(Request $request, $id){
				// para editar los datos sin guardar aun
				$edit_teacher = Teacher::find($id);

				$show_course = Course::all();

				return view('edit_teacher',compact('edit_teacher','show_course'));

		}


		public function update_teacher(Request $request, $id){
				
				$update_teacher = Teacher::find($id);
				$update_teacher->name = $request->get('name');
				$update_teacher->surname = $request->get('surname');
				$update_teacher->age = $request->get('age');
				$update_teacher->profession = $request->get('profession');
				$update_teacher->course_id = $request->get('category');
				$update_teacher->save();

		         return redirect('/show_teacher')->with('success','Usuario atualizado com êxito');
		}



		public function delete_teacher(Request $request, $id){
				$delete_teacher = Teacher::find($id);
				$delete_teacher->delete();
		        return redirect('/show_teacher')->with('deleted','Curso elminado com êxito'.":".$delete_teacher->name);



		}


} // Fin of the class controller
