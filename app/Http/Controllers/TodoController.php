<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $usuario_id = Auth::user()->id;
        $todos = Todo::where(['usuario_id' => $usuario_id])->get();
        return view('todo.list', ['todos' => $todos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todo.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $usuario_id = Auth::user()->id;
        $input = $request->input();
        $input['usuario_id'] = $usuario_id;
        $todoStatus = Todo::create($input);

        if ($todoStatus) {
            # code...
            $request->session()->flash('Sucesso', 'Usuário adicionado com sucesso!.');
        } else {
            # code...
            $request->session()->flash('erro', 'algum coisa de errado aconteceu, Usuário não salvo!.');
        }
        return redirect('todo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $usuario_id = Auth::user()->id;
        $todo = Todo::where(['usuario_id' => $usuario_id, 'id' => $id])->first();

        if (!$todo) {
            # code...
            return redirect('todo')->with('error', 'Usuário não encontrado!.');
        }
        return view('todo.view', ['todo' => $todo]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $usuario_id = Auth::user()->id;
        $todo = Todo::where(['usuario_id' => $usuario_id, 'id' => $id])->first();

        if ($todo) {
            # code...
            return view('todo.edit', ['todo' => $todo]);
        } else {
            # code...
            return redirect('todo')->with('error', 'Usuário não encontrado!.');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $usuario_id = Auth::user()->id;
        $todo = Todo::find($id);

        if (!$todo) {
            # code...
            return redirect('todo')->with('error', 'Usuário não encontrado!.');
        }
        $input = $request->input();
        $input['usuario_id'] = $usuario_id;
        $todoStatus = $todo->update($input);
        if ($todoStatus) {
            # code...
            return redirect('todo')->with('success', 'Usuário atualizado com sucesso!.');
        } else {
            # code...
            return redirect('todo')->with('erro', 'Aconteceu alguma de errado, usuário não atualizado!.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $usuario_id = Auth::user()->id;
        $todo = Todo::where(['usuario_id' => $usuario_id, 'id' => $id])->first();
        $respStatus = $respMsg = '';

        if (!$todo) {
            # code...
            $respStatus = 'error';
            $respMsg = 'Uusário não encontrado!.';
        }
        $todoDelStatus = $todo->delete();

        if ($todoDelStatus) {
            # code...
            $respStatus = 'success';
            $respMsg = 'Usuário deletado com sucesso!.';
        } else {
            # code...
            $respStatus = 'error';
            $respMsg = 'Aconteceu algo de errado, usuário não deletado!.';
        }
        return redirect('todo')->with($respStatus, $respMsg);

    }
}
