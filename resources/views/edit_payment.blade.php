@extends('layouts.app')


@section('content')

<h4>Cadastro de pagamentos</h4>

    
<div class="container">
    <div class="content">
 
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-4 col-md-offset-4">
 
                    <form method="POST" action="{{ url('/update_payment',$find_payment->id) }}">
                          {{ csrf_field() }}
                          {{ method_field('PUT') }}
                         <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                       
                        <input type="hidden" name="id" value= "{{ $find_payment->id }}"/>
                        
                        <label for="date">Fecha</label>
                       
                        <div class="input-group date">
                        <input type="text" class="form-control" autocomplete="off" id="sandbox-container" name="date"  ><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>

                         <select class="form-control"  name = "categoryst" >
                        @foreach($show_student as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        </select>   
                                    
                        <label>Valor$R</label>
                        <label>Pagamento</label>
                        <input type="text" name="payment" value="{{$find_payment->payment}}"/ > 

                        <button type="submit" class="btn btn-default btn-primary">Enviar</button>
                    

                   </form>
 
                </div>
            </div>
        </div>
 
    </div>
</div>


<script type="text/javascript">
$('#sandbox-container').datepicker({
    
     format: 'dd/mm/yyyy',
     language: 'pt-BR'
    
  });

</script>





@endsection