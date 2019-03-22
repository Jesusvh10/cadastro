<?php

namespace App\Http\Controllers\API\v1\Users;
use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Course;
use App\Student;
use DB;


class Student_controller extends Controller
{
     public function __construct(){

		$this->middleware('auth');

	} // to keep safe the tab in methods get, post etc.


	private $path ='user';




	public function show_student(){
			    
					
			$query = "students.id, students.name as namet, students.surname, students.age, students.profession, students.course_id, courses.name as curso";

			$teacher = DB::table('students')
			->select(DB::raw($query))
			->leftJoin('courses', 'courses.id', '=', 'students.course_id')
			->whereNull('students.deleted_at')
			->paginate(5);


			return view('show_student',compact('teacher'));
				
				
				
		}


		public function register_student(){
				
			 	 $show_course = Course::all();
			 	return view('register_student',compact('show_course'));
			 	
		}


		public function saving_student(Request $request){

				$saving_student = new Student;
				$saving_student->name = $request->get('name');
				$saving_student->surname = $request->get('surname');
				$saving_student->age = $request->get('age');
				$saving_student->profession = $request->get('profession');
				$saving_student->course_id = $request->get('category');
				$saving_student->save();

				return redirect('show_student')->with('success','Usuario Cadastrado com êxito');


		}



		public function edit_student(Request $request, $id){
				// para editar los datos sin guardar aun
				$edit_student = Student::find($id);

				$show_course = Course::all();

				return view('edit_student',compact('edit_student','show_course'));

		}


		public function update_student(Request $request, $id){
				
				$update_student = Student::find($id);
				$update_student->name = $request->get('name');
				$update_student->surname = $request->get('surname');
				$update_student->age = $request->get('age');
				$update_student->profession = $request->get('profession');
				$update_student->course_id = $request->get('category');
				$update_student->save();

		         return redirect('/show_student')->with('success','Usuario atualizado com êxito');
		}



		public function delete_student(Request $request, $id){
				$delete_student = Student::find($id);
				$delete_student->delete();
		        return redirect('/show_student')->with('deleted','Curso elminado com êxito'.":".$delete_student->name);



		}




}
