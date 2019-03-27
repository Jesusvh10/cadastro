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
				 $show_student = Student::all();
			 	 $show_module = Module::all();

				$find_note = Note::find($id);

				return view('edit_note',compact('show_student','show_module','find_note'));

		}


		public function update_note(Request $request, $id){
				
				$update_note = Note::find($id);
				$update_note->note = $request->get('note');
				$update_note->student_id = $request->get('categoryst');
				$update_note->module_id = $request->get('categorymd');
				
				$update_note->save();

		         return redirect('/show_note')->with('success','Usuario atualizado com êxito');
		}



		public function delete_note(Request $request, $id){
				$delete_note = Note::find($id);
				$delete_note->delete();
		        return redirect('/show_note')->with('deleted','Curso elminado com êxito'.":".$delete_note->name);



		}

































}// End of the class
