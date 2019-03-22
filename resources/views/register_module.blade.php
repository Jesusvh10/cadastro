@extends('layouts.app')


@section('content')

<h4>Cadastro de modulos</h4>


<div class="container" >
	@include('layouts.erro')
	<div class="row">
		


		<form method="POST" action="{{ url('/saving_module') }}">
		{{ csrf_field() }}
			<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
			<label>Nome</label>
			<input type="text" name="name">
																
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