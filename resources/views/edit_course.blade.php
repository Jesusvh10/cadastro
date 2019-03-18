@extends('layouts.app')


@section('content')
<h4>Cursos cadastrados</h4>


 <div class="container" >
  <div class="row">
    
      <form method="POST" action="{{ url('/update_course', $edit_course->id) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    <label>Nome</label>
    <input type="text" name="name" value= "{{ $edit_course->name }}"/>
    
    <button class="btn btn-primary  " >salvar</button>
        </form>
    </div>
    </div>
    



@endsection