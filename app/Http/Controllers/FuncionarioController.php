<?php

namespace App\Http\Controllers;

use App\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FuncionarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $funcionarios = Funcionario::get();
        return view('funcionarios.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('funcionarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required | max:35',
            'cargo' => 'required | max:20',
            'data_matricula' => 'date',
            'salario' => 'required | numeric'
        ]);

        Funcionario::create($request->all());

        $nome = $request->input('nome');

        return redirect()->route('funcionarios.index')
                ->with('Funcionario '. $nome .' adicionado com sucesso.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function show(Funcionario $funcionario)
    {
        return view('funcionarios.show', compact('funcionario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function edit(Funcionario $funcionario)
    {
        return view('funcionarios.edit', compact('funcionario'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Funcionario $funcionario)
    {
        $request->validate([
            'nome' => 'required',
            'cargo' => 'required',
            'data_matricula' => 'required',
            'salario' => 'required'
        ]);

        $funcionario->update($request->all());

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Funcionario  $funcionario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Funcionario $funcionario)
    {
        $funcionario->delete();

        return redirect()->route('funcionarios.index')->with('success', 'Funcionário removido com sucesso!');
    }
}
