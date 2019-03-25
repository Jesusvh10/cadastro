@extends('layouts.app')


@section('content')
@if (session('success'))
      <div class="alert alert-success">
          {{ session('success') }}
      </div>
  @endif

  @if (session('deleted'))
      <div class="alert alert-danger">
          {{ session('deleted')}}
      </div>
  @endif
<h4>Cadastrados de notas</h4>
 


<table class="table">
      <thead>
        <tr>
          <th scope="col">#id</th>
          <th scope="col">Nome</th>
          <th scope="col">curso</th>
          <th scope="col">Nota</th>
         
          <th>Editar</th> 
          <th>Delete</th>
          <th> <a href="{{ URL::to('/register_note')}}" class="btn btn-primary float-right ">Cadastrar</a>
          </th>
        </tr>
      </thead>
        <tbody>
         
          @foreach($note as $item)
           <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->namet}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->note}}</td>
                          
                     
             

              <td><a href="{{ URL::to('/edit_module',$item->id)}}" class="btn btn-primary">Edit</a></td>         
            <td>
              <form action="{{ URL::to('/delete_module',$item->id)}}"method="post">
                 @csrf
                 @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>
              </form>
             </td>

          </tr>
          @endforeach()
        </tbody>
  </table>
    {{$note->links()}}
    @endsection
    