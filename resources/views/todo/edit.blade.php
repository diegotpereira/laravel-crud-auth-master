@extends('layouts.app')

@section('content')

<div class="container">
 <br>
    <div class="row justify-content-center">
        <div class="col-md-6">
           <h2>Editar Usuário</h2>
        </div>
        <div class="col-md-6">
           <div class="float-rigth">
               <a href="{{ route('todo.index') }}" class="btn btn-primary">Voltar</a>
           </div>
        </div>
        <br>
        <div class="col-md-12">
            @if (session('success'))
               <div class="alert alert-success" role="alert">
                  {{ session('success')}}
               </div>
            @endif
            @if (session('error'))
               <div class="alert alert-error" role="alert">
                  {{ session('error')}}
               </div>
            @endif
            <form action="{{ route('todo.update', ['todo' => $todo->id]) }}" method="POST">
               @csrf
               @method('PUT')
               <div class="form-group">
                   <label for="titulo">Titulo:</label>
                   <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $todo->titulo }}">
               </div>
               <div class="form-group">
                   <label for="descricao">Descrição:</label>
                   <textarea name="descricao" class="form-control" id="descricao" rows="5">{{ $todo->descricao }}</textarea>
               </div>
               <div class="form-group">
               <label for="status">Selecione seu status</label>
               <select class="form-control" id="status" name="status">
                  <option value="pendente" @if ($todo->status == 'pendente') selected @endif>Pendente</option>
                  <option value="completo" @if ($todo->status == 'completo') selected @endif>Completo</option>
               </select>
               </div>
               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection
