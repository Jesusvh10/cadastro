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
<h4>Control de assistência</h4>
 


<table class="table">
      <thead>
        <tr>
          <th scope="col">#id</th>
          <th scope="col">Nome</th>
          <th scope="col">Curso</th>
          <th scope="col">Tipo</th>
          <th scope="col">Data</th>
         
          <th>Editar</th> 
          <th>Delete</th>
          <th> <a href="{{ URL::to('/register_absence')}}" class="btn btn-primary float-right ">Cadastrar</a>
          </th>
        </tr>
      </thead>
        <tbody>
         
          @foreach($absence as $item)
           <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->al}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->tipe}}</td>
              <td>{{$item->date}}</td>
                          
                     
             

              <td><a href="{{ URL::to('/edit_absence',$item->id)}}" class="btn btn-primary">Edit</a></td>         
            <td>
              <form action="{{ URL::to('/delete_absence',$item->id)}}"method="post">
                 @csrf
                 @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>
              </form>
             </td>

          </tr>
          @endforeach()
        </tbody>
  </table>
    {{$absence->links()}}
    @endsection
    