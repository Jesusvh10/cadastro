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


                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Seja bem-vindo ao menu principal!!!


                  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
