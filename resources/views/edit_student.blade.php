@extends('layouts.app')


@section('content')
<h4>Cursos cadastrados</h4>


 <div class="container" >
  <div class="row">
    
      <form method="POST" action="{{ url('/update_student', $edit_student->id) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
    

    <input type="hidden" name="id" value= "{{ $edit_student->id }}"/>


    <label>Nome</label>
    <input type="text" name="name" value= "{{ $edit_student->name }}"/>

    <label>Sobrenome</label>
    <input type="text" name="surname" value= "{{ $edit_student->surname }}"/>

    <label>Edade</label>
    <input type="text" name="age" value= "{{ $edit_student->age }}"/>

    <label>Profissão</label>
    <input type="text" name="profession" value= "{{ $edit_student->profession }}"/>

    

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