@extends('layouts.app')


@section('content')

<h4>Cadastro de alunos</h4>


<div class="container" >
    @include('layouts.erro')
    <div class="row">
        


        <form method="POST" action="{{ url('/update_note',$find_note->id) }}">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
            <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
            
             <input type="hidden" name="id" value= "{{ $find_note->id }}"/>

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
            <input type="text" name="note" value="{{$find_note->note}}"/ > 

            <button class="btn btn-primary  " >salvar</button>
        </form>
    </div>
</div>



@endsection