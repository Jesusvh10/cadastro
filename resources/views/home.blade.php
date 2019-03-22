@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard

                      @component('layouts/alert')

                      @slot('title')

                      Não esqueça de fechar a sessão!!!

                      @endslot

                       <strong>Session activa</strong>                    

                      @endcomponent
                      <h6  class="panel-title">Bienvenido  {{auth()->user()->name}}</h6>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Seja bem-vindo ao menu principal!!!

                    <a href="{{ URL::to('/show_course')}}" class="btn btn-primary float-right ">Courses</a>
                    <a href="{{ URL::to('/show_teacher')}}" class="btn btn-primary float-right ">Teachers</a>
                    <a href="{{ URL::to('/show_student')}}" class="btn btn-primary float-right ">Students</a>


                  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
