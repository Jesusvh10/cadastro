<?php

namespace App\Http\Controllers\API\v1\Users;
use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Note;
use App\Module;
use App\Student;
use App\Http\Requests\Validation_Student;
use DB;


class Note_controller extends Controller
{
    public function __construct(){

		$this->middleware('auth');

	} // to keep safe the tab in methods get, post etc.


	private $path ='user';


	public function show_note(){
			    
					
			$query = "notes.id, students.name as namet, modules.name, notes.note ";

			 $note = DB::table('notes')
			->select(DB::raw($query))
			->leftJoin('modules', 'modules.id', '=', 'notes.module_id')
			->leftJoin('students','students.id', '=', 'notes.student_id')
			->whereNull('notes.deleted_at')
			->paginate(5);


			return view('show_note',compact('note'));
				
				
				
		}


		public function register_note(){
				
				 $show_student = Student::all();
			 	 $show_module = Module::all();
			 	
			 	return view('register_note',compact('show_student','show_module'));
			 	
		}


		public function saving_note(Request $request){

				$saving_note = new Note;
				$saving_note->student_id = $request->get('categoryst');
				$saving_note->module_id = $request->get('categorymd');
				$saving_note->note = $request->get('note');
				$saving_note->save();

				return redirect('show_note')->with('success','Nota Cadastrado com êxito');


		}



		public function edit_note(Request $request, $id){
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

































}// End of the class
