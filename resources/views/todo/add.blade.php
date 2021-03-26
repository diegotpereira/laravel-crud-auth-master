@extends ('layouts.app')

@section('content')
<div class="container">
<br>
  <div class="row justify-content-center">
      <div class="col-md-6">
          <h2>Nova Tarefa</h2>
      </div>
      <div class="col-md-6">
          <div class="float-right">
             <a href="{{ route('todo.index') }}" class="btn btn-primary">Voltar</a>
          </div>
      </div>
      <br>
      <div class="col-md-12">
          @if(session('success'))
             <div class="alert alert-success" role="alert">
                 {{ session('success')}}
             </div>
           @endif
           @if (session('error'))
              <div class="alert alert-error" role="alert">
                 {{ session('error')}}
              </div>
            @endif
            <form action="{{ route('todo.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="titulo">Titulo:</label>
                    <input type="text" class="form-control" id="titulo" name="titulo">
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição:</label>
                    <textarea name="descricao" class="form-control" id="descricao" rows="5"></textarea>
                </div>
                <div class="form-group">
                <label for="status">Selecione seu Status</label>
                <select class="form-control" id="status" name="status">
                   <option value="pendente">Pendente</option>
                   <option value="completo">Completo</option>
                </select>
                </div>
                <button type="submit" class="btn btn-primary">Salvar</button>
            </form>
      </div>
  </div>
</div>
@endsection
