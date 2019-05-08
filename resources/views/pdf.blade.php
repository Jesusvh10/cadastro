
<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>
<<div class="container">
 
  <h3 class="page-header  text-center text-primary  "  >Reportes de Pagamentos</h3>
  <p class="text-center text-primary" >Aula de Español</p>
  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover">
      <thead>
      <tr class="success"  >
        <th class="text-center">ID</th>
        <th class="text-center">Nome</th>
        <th class="text-center">Data</th>
        <th class="text-center">Pagamento</th>
        
      </tr>
      </thead>
      <tbody>
         
          @foreach($payment as $item)
           <tr class="text-center">
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
  </div>
</div>
<div class="container">
 
</div>
</body>
</html>