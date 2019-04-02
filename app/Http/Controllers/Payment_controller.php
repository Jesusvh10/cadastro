<?php

namespace App\Http\Controllers\API\v1\Users;
use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Payment;
use App\Student;
use App\Http\Requests\Validation_Note;
use DB;

class Payment_controller extends Controller
{
    public function __construct(){

		$this->middleware('auth');

	} // to keep safe the tab in methods get, post etc.


	private $path ='user';



	public function show_payment(){
			    
					
			$query = "payments.id, payments.date, students.name, payments.payment";

			 $payment = DB::table('payments')
			->select(DB::raw($query))
			->leftJoin('students','students.id', '=', 'payments.student_id')
			->whereNull('payments.deleted_at')
			->paginate(5);


			return view('show_payment',compact('payment'));
				
				
				
		}


		public function register_payment(){
				
				 $show_student = Student::all();



		 	 			 	
			 	return view('register_payment',compact('show_student'));
			 	
		}


		public function saving_payment(Request $request){
				
			   $date = implode('-', array_reverse(explode('/', $request->get('date'))));
			   			    
			    $saving_payment = new Payment;
				$saving_payment->date = $date;
				$saving_payment->student_id = $request->get('categoryst');
				$saving_payment->payment = $request->get('payment');
				$saving_payment->save();


				return redirect('show_payment')->with('success','Pagamento cadastrado com êxito');


		}



		public function edit_payment(Request $request, $id){
				// para editar los datos sin guardar aun
				 $show_student = Student::all();
			 	 
				 $find_payment = Payment::find($id);

				 return view('edit_payment',compact('show_student','find_payment'));

		}


		public function update_payment(Request $request, $id){

			$date = implode('-', array_reverse(explode('/', $request->get('date'))));
				
				$update_payment = Payment::find($id);
				$update_payment->date = $date;
				$update_payment->student_id = $request->get('categoryst');
				$update_payment->payment = $request->get('payment');
				
				$update_payment->save();

		         return redirect('/show_payment')->with('success','Usuario atualizado com êxito');
		}



		public function delete_payment(Request $request, $id){
				$delete_payment = Payment::find($id);
				$delete_payment->delete();
		        return redirect('/show_payment')->with('deleted','Curso elminado com êxito'.":".$delete_payment->name);



		}



} //End of the class 
