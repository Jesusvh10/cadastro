<?php

namespace App\Http\Controllers\API\v1\Users;
use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Absence;
use App\Student;
use App\Module;
use App\Http\Requests\Validation_payment;
use DB;

class Absences_controller extends Controller
{
     public function __construct(){

		$this->middleware('auth');

	} // to keep safe the tab in methods get, post etc.


	private $path ='user';



	public function show_absence(){
			    
									
			 $absence = Absence::select('absences.id','students.name as al','modules.name','absences.tipe','absences.date')
			->leftJoin('students','students.id', '=', 'absences.student_id')
			->leftJoin('modules','modules.id', '=', 'absences.module_id')
			->whereNull('absences.deleted_at')
			->paginate(15);



			


			return view('show_absence',compact('absence'));
				
				
				
		}


		public function register_absence(){
				
				 $show_student = Student::all();
				 $show_module = Module::all();



		 	 			 	
			 	return view('register_absence',compact('show_student','show_module'));
			 	
		}


		public function saving_absence(Request $request){
				
			   $date = implode('-', array_reverse(explode('/', $request->get('date'))));
			   			    
			    $saving_absence = new Absence;
				$saving_absence->date = $date;
				$saving_absence->student_id = $request->get('categoryst');
				$saving_absence->module_id = $request->get('categorymd');
				$saving_absence->tipe = $request->get('absence');
				$saving_absence->save();


				return redirect('show_absence')->with('success','Estudante atualizado com êxito');


		}



		public function edit_absence(Request $request, $id){
				// para editar los datos sin guardar aun
				 $show_student = Student::all();
				 $show_module = Module::all();
			 	 
				 $find_absence = Absence::find($id);

				 return view('edit_absence',compact('show_student','show_module','find_absence'));

		}


		public function update_absence(Request $request, $id){

			$date = implode('-', array_reverse(explode('/', $request->get('date'))));
			   			    
			    $saving_absence = new Absence;
				$saving_absence->date = $date;
				$saving_absence->student_id = $request->get('categoryst');
				$saving_absence->module_id = $request->get('categorymd');
				$saving_absence->tipe = $request->get('absence');
				$saving_absence->save();


				return redirect('show_absence')->with('success','Estudante atualizado com êxito');
		}



		public function delete_absence(Request $request, $id){
				$delete_absence = Absence::find($id);
				
				$delete_absence->delete();
		        return redirect('/show_absence')->with('deleted','Estudante elminado com êxito'.":".$delete_absence->name);



		}
}
