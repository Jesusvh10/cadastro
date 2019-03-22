@extends('layouts.app')


@section('content')

<h4>Cadastro de alunos</h4>


<div class="container" >
	@include('layouts.erro')
	<div class="row">
		


		<form method="POST" action="{{ url('/saving_student') }}">
		{{ csrf_field() }}
			<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
			<label>Nome</label>
			<input type="text" name="name">
			
			<label>Sobrenome</label>
			<input type="text" name="surname">			
			
			<label>Edade</label>
			<input type="text" name="age">
			
			<label>Profissão</label>
			<input type="text" name="profession">	
			 <select class="form-control"  name = "category" >
            
                @foreach($show_course as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>		

			<button class="btn btn-primary  " >salvar</button>
		</form>
	</div>
</div>



@endsection