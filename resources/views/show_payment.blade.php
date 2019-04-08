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
<h4>Cadastrados de pagamentos</h4>
 


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
              <td>
                <?php
                  $aux = explode("/", $item->date);
                  

                  if($aux[0] === '01'){
                    $month = 'Janeiro';
                  }else if($aux[0] === '02'){
                    $month = 'Fevereiro';
                  }else if($aux[0] === '03'){
                    $month = 'Março';
                  }else if($aux[0] === '04'){
                    $month = 'Abril';
                  }else if($aux[0] === '05'){
                    $month = 'Maio';
                  }else if($aux[0] === '06'){
                    $month = 'Junho';
                  }else if($aux[0] === '07'){
                    $month = 'Julho';
                  }else if($aux[0] === '08'){
                    $month = 'Agosto';
                  }else if($aux[0] === '09'){
                    $month = 'Setembro';
                  }else if($aux[0] === '10'){
                    $month = 'Outubro';
                  }else if($aux[0] === '11'){
                    $month = 'Novembro';
                  }else if($aux[0] === '12'){
                    $month = 'Dezembro';
                  }

                  echo $month.'-'.$aux[1];
                ?>
                </td>
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
    