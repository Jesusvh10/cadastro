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
          <th scope="col">Data</th>
          <th scope="col">Pagamento</th>
         
          <th>Editar</th> 
          <th>Delete</th>
          <th> <a href="{{ URL::to('/register_payment')}}" class="btn btn-primary float-right ">Cadastrar</a>
          </th>
        </tr>
      </thead>
        <tbody>
         
          @foreach($payment as $item)
           <tr>
              <td>{{$item->id}}</td>
              <td>{{$item->name}}</td>
              <td>{{$item->date}}</td>
              <td>{{$item->payment}}</td>
                          
                     
             

              <td><a href="{{ URL::to('/edit_payment',$item->id)}}" class="btn btn-primary">Edit</a></td>         
            <td>
              <form action="{{ URL::to('/delete_payment',$item->id)}}"method="post">
                 @csrf
                 @method('DELETE')
              <button class="btn btn-danger" type="submit">Delete</button>
              </form>
             </td>

          </tr>
          @endforeach()
        </tbody>
  </table>
    {{$payment->links()}}
    @endsection
    