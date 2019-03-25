@extends('layouts.app')


@section('content')

<h4>Cadastro de alunos</h4>


<div class="container" >
	@include('layouts.erro')
	<div class="row">
		


		<form method="POST" action="{{ url('/saving_note') }}">
		{{ csrf_field() }}
			<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
			
						
			 <select class="form-control"  name = "categoryst" >
                @foreach($show_student as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
             </select>	


             <select class="form-control"  name = "categorymd" >
                @foreach($show_module as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
             </select>	

            
            <label>Nota</label>
			<input type="text" name="note">	

			<button class="btn btn-primary  " >salvar</button>
		</form>
	</div>
</div>



@endsection