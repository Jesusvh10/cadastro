@extends('layouts.app')


@section('content')

<h4>Cadastro de Ausencias</h4>

    
<div class="container">
  @include('layouts.erro')
    <div class="content">
 
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="col-md-4 col-md-offset-4">
 
                    <form method="POST" action="{{ url('/saving_absence') }}">
		                  {{ csrf_field() }}
			             <input name="_token" type="hidden" value="{{ csrf_token() }}"/>
                       
                        <label for="date">Data</label>
                       
                        <div class="input-group date">
                        <input type="text" class="form-control" autocomplete="off" id="sandbox-container" name="date"  ><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                        </div>
                        <br>

                         <select class="form-control"  name = "categoryst" >
                        @foreach($show_student as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        </select>	<br>


                         <select class="form-control"  name = "categorymd" >
                        @foreach($show_module as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                        </select> <br>

                        <input type="radio" name="absence" value="0" >Não<br>
                        <input type="radio" name="absence" value="1">Sim

                        <br><br>
            			            
			          


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
     language: 'pt-BR',
      
    
  });

</script>





@endsection