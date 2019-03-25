<?php

namespace App\Http\Controllers\API\v1\Users;
use App\Http\Controllers\Controller;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Course;
use App\Module;
use App\Http\Requests\Validation_modules;
use DB;

class Mudule_controller extends Controller
{
     public function __construct(){

		$this->middleware('auth');

	} // to keep safe the tab in methods get, post etc.


	private $path ='user';




	public function show_module(){
			    
					
			$query = " modules.name as namet, courses.name as curso,modules.id";

			$teacher = DB::table('modules')
			->select(DB::raw($query))
			->leftJoin('courses', 'courses.id', '=', 'modules.course_id')
			->whereNull('modules.deleted_at')
			->paginate(5);


			return view('show_module',compact('teacher'));
				
				
				
		}


		public function register_module(){
				
			 	$show_course = Course::all();
			 	return view('register_module',compact('show_course'));
			 	
		}


		public function saving_module(Validation_modules $request){

				$saving_module = new Module;
				$saving_module->name = $request->get('name');
				$saving_module->course_id = $request->get('category');
				$saving_module->save();

				return redirect('show_module')->with('success','Usuario Cadastrado com êxito');


		}



		public function edit_module(Request $request, $id){
				// para editar los datos sin guardar aun
				$edit_module = Module::find($id);

				$show_course = Course::all();

				return view('edit_module',compact('edit_module','show_course'));

		}


		public function update_module(Request $request, $id){
				
				$update_module = Module::find($id);
				$update_module->name = $request->get('name');
				$update_module->course_id = $request->get('category');
				$update_module->save();

		         return redirect('/show_module')->with('success','Modulo atualizado com êxito');
		}



		public function delete_module(Request $request, $id){
				
				$delete_module = Module::find($id);
				$delete_module->delete();
		        return redirect('/show_module')->with('deleted','Modulo elminado com êxito'.":".$delete_module->name);



		}
}
