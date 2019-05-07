<?php


namespace App\Http\Controllers\API\v1\Users;
use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Payment;
use App\Student;
use App\Http\Requests\Validation_payment;
use DB;

class Reportpayments_controller extends Controller
{
    public function __construct(){

		$this->middleware('auth');

	} // to keep safe the tab in methods get, post etc.


	private $path ='user';

	public function search(Request $request){

		$search = $request->get('search1');

		 $payment = Payment::select('payments.id','payments.date','students.name','payments.payment')
		->leftJoin('students','students.id','=','payments.student_id')
		->where('students.name', 'like', '%'.$search.'%')
		->orwhere('payments.date', 'like', '%'.$search.'%')
		->whereNull('payments.deleted_at')
		->paginate(15);

		return view('report_payment',compact('payment'));


	}












}// This is the final of the class
