@extends('layouts.app')


@section('content')

<h4>Cadastre um curso</h4>


<div class="container" >
	@include('layouts.erro')
	<div class="row">
		


		<form method="POST" action="{{ url('/saving_course') }}">
		{{ csrf_field() }}
			<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
			<label>Nome</label>
			<input type="text" name="name">
			
			<button class="btn btn-primary  " >salvar</button>
		</form>
	</div>
</div>



@endsection
