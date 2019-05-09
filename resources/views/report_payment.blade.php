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
  <br>
<h4>Reportes de pagamentos</h4>

    <form action="/generatepdf" method="get">
     
    
    <div class="input-group">
     
       <input type="search" name="search9" value= "{{ $search }}"/>
      <span class="input-group-prepend" >
         <button type="submit"class="btn btn-primary">PDF</button>
     
      </span> 

      
    </div>
  </form>
  
   
  
  <form action="/report_payment" method="get">
    
    <div class="input-group">
     
      <input type="search" name="search1" class ="form-control">
      <span class="input-group-prepend" >
        <button type="submit"class="btn btn-primary">Search</button>
      </span> 

      
    </div>
  </form>



<table class="table">
      <thead>
        <tr>
          <th scope="col">#id</th>
          <th scope="col">Nome</th>
          <th scope="col">Data</th>
          <th scope="col">Pagamento</th>
         
          
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
                          
                     
             
       

          </tr>
          @endforeach()
        </tbody>
  </table>
    
    @endsection
    