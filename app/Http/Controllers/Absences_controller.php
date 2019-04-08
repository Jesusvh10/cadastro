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
			    
					
			/*$query = "payments.id, payments.date, students.name, payments.payment";

			 $payment = DB::table('payments')
			->select(DB::raw($query))
			->leftJoin('students','students.id', '=', 'payments.student_id')
			->whereNull('payments.deleted_at')
			->paginate(5);*/



			$payment = Payment::select('payments.id', 'payments.date', 'students.name', 'payments.payment')->leftJoin('students','students.id', '=', 'payments.student_id')
			->whereNull('payments.deleted_at')
			->paginate(15);



			return view('show_payment',compact('payment'));
				
				
				
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


				return redirect('register_absence')->with('success','Pagamento cadastrado com êxito');


		}



		public function edit_absence(Request $request, $id){
				// para editar los datos sin guardar aun
				 $show_student = Student::all();
			 	 
				 $find_payment = Payment::find($id);

				 return view('edit_payment',compact('show_student','find_payment'));

		}


		public function update_absence(Request $request, $id){

			$date = implode('-', array_reverse(explode('/', $request->get('date'))));
				
				$update_payment = Payment::find($id);
				$update_payment->date = $date;
				$update_payment->student_id = $request->get('categoryst');
				$update_payment->payment = $request->get('payment');
				
				$update_payment->save();

		         return redirect('/show_payment')->with('success','Usuario atualizado com êxito');
		}



		public function delete_absence(Request $request, $id){
				$delete_payment = Payment::find($id);
				$delete_payment->delete();
		        return redirect('/show_payment')->with('deleted','Curso elminado com êxito'.":".$delete_payment->name);



		}
}
