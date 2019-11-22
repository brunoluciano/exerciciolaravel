<?php

namespace App\Http\Controllers;

use App\Funcionario;
use App\Cargo;
use App\Level;

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
        $funcionarios = Funcionario::orderby('id','desc')->get();

        foreach ($funcionarios as $funcionario) {
            $baseSalCargo = $funcionario->cargo->salarioBase;
            $percAumento = $funcionario->level->percAumento;
            $salario = $baseSalCargo + (($baseSalCargo*$percAumento)/100);

            Funcionario::where('id','=',$funcionario->id)
                       ->update(['salario' => $salario]);
        }

        return view('funcionarios.index', compact('funcionarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $funcionarios = Funcionario::get();
        $cargos = Cargo::orderby('descricao')->get();
        $levels = Level::orderby('percAumento')->get();

        foreach ($funcionarios as $funcionario) {
            $baseSalCargo = $funcionario->cargo->salarioBase;
            $percAumento = $funcionario->level->percAumento;
            $salario = $baseSalCargo + (($baseSalCargo*$percAumento)/100);

            Funcionario::where('id','=',$funcionario->id)
                       ->update(['salario' => $salario]);
        }

        return view('funcionarios.create', compact('cargos', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $funcionarios = Funcionario::get();

        $request->validate([
            'nome' => 'required | max:35',
            'data_matricula' => 'date'
        ]);

        Funcionario::create($request->all());

        $lastId = Funcionario::latest()->first()->id;

        $nome = $request->input('nome');
        $cargo_id = $request->input('cargo_id');
        $level_id = $request->input('level_id');

        $salarioBase = Cargo::where('id', '=', $cargo_id)->get()->first();
        $perc = Level::where('id', '=', $level_id)->get()->first();

        $baseSalCargo = $salarioBase->salarioBase;
        $percAumento = $perc->percAumento;
        $salario = $baseSalCargo + (($baseSalCargo*$percAumento)/100);

        Funcionario::where('id','=',$lastId)
                    ->update(['salario' => $salario]);

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
        $baseSalCargo = $funcionario->cargo->salarioBase;
        $percAumento = $funcionario->level->percAumento;
        $salario = $baseSalCargo + (($baseSalCargo*$percAumento)/100);
        Funcionario::where('id','=',$funcionario->id)
                   ->update(['salario' => $salario]);

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
        $cargos = Cargo::orderby('descricao')->get();
        $levels = Level::orderby('percAumento')->get();

        return view('funcionarios.edit', compact('funcionario', 'cargos', 'levels'));
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
            'data_matricula' => 'required'
        ]);

        $funcionario->update($request->all());

        $baseSalCargo = $funcionario->cargo->salarioBase;
        $percAumento = $funcionario->level->percAumento;
        $salario = $baseSalCargo + (($baseSalCargo*$percAumento)/100);
        Funcionario::where('id','=',$funcionario->id)
                   ->update(['salario' => $salario]);

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
