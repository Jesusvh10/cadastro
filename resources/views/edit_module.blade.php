@extends('layouts.app')


@section('content')
<h4>Modulos cadastrados cadastrados</h4>


 <div class="container" >
  <div class="row">
    
      <form method="POST" action="{{ url('/update_module', $edit_module->id) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
        
    <input type="hidden" name="id" value= "{{ $edit_module->id }}"/>

    <label>Nome</label>
    <input type="text" name="name" value= "{{ $edit_module->name }}"/>
    
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