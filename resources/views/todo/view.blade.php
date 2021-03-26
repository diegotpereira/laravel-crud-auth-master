@extends('layouts.app')

@section('content')
<div class="container">
 <br>
    <div class="row justify-content-center">
         <div class="col-md-6">
            <h2>Usuário detalhe</h2>
         </div>
         <div class="col-md-6">
            <div class="float-rigth">
               <a href="{{ route('todo.index') }}" class="btn btn-primary">Voltar</a>
            </div>
         </div>
         <br>
         <div class="col-md-12">
              <br><br>
              <div class="todo-titulo">
                 <strong>Titulo: </strong> {{ $todo->titulo }}
              </div>
              <br>
              <div class="todo-descricao">
                  <strong>Descrição: </strong> {{ $todo->descricao}}
              </div>
              <br>
              <div class="todo-descricao">
                  <strong>Status: </strong> {{ $todo->status }}
              </div>
         </div>
    </div>
</div>
@endsection
