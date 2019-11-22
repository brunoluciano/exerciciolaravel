@extends('layout')
@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="jumbotron bg-dark text-white py-4">
                <h1>Editar funcionário <i class="display-3">{{ $funcionario->nome }}</i></h1>
                <hr class="my-2 bg-info">
                <div class="row justify-content-center">
                    <div class="col-md-10 mt-3">
                        <div class="jumbotron bg-secondary pt-5 pb-0 border border-white">
                            <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="POST" class="mt-0">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2 col-form-label text-right">Nome</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="nome" placeholder="Nome do funcionário" value="{{ $funcionario->nome }}" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleFormControlSelect1" class="col-md-2 col-form-label text-right">Cargo</label>
                                    <div class="col-md-10">
                                        <select class="form-control" id="exampleFormControlSelect1" name="cargo_id" required>
                                            {{-- <option selected>Escolher...</option> --}}
                                            @foreach ($cargos as $cargo)
                                                @if ($funcionario->cargo->id == $cargo->id)
                                                    <option selected value="{{ $cargo->id }}">{{ $cargo->descricao }}</option>
                                                @else
                                                    <option value="{{ $cargo->id }}">{{ $cargo->descricao }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleFormControlSelect1" class="col-md-2 col-form-label text-right">Nível</label>
                                    <div class="col-md-10">
                                        <select class="form-control" id="exampleFormControlSelect1" name="level_id" required>
                                            <option selected>Escolher...</option>
                                            @foreach ($levels as $level)
                                                @if ($funcionario->level->id == $level->id)
                                                    <option selected value="{{ $level->id }}">{{ $level->descricao }}</option>
                                                @else
                                                    <option value="{{ $level->id }}">{{ $level->descricao }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2 col-form-label text-right">Cargo</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="cargo" placeholder="Cargo do funcionário" value="{{ $funcionario->cargo->descricao }}" autocomplete="off" required>
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2 col-form-label text-right">Data Matrícula</label>
                                    <div class="col-md-10">
                                        <input type="date" class="form-control" name="data_matricula" value="{{ date('Y-m-d', strtotime($funcionario->data_matricula)) }}" required>
                                    </div>
                                </div>
                                {{-- <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2 col-form-label text-right">Salário</label>
                                    <div class="col-md-10">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">R$</div>
                                            </div>
                                            <input type="number" step="0.01" class="form-control" name="salario" placeholder="Salário do funcionário" value="{{number_format($funcionario->salario,2,'.','')}}" required>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="form-group row">
                                    <div class="col-md-10 offset-md-2">
                                        <hr class="bg-white">
                                        <input type="submit" class="btn btn-info" value="Atualizar">
                                        <input type="reset" class="btn btn-dark" value="Limpar">
                                    </div>
                                </div>
                            </form>
                        </div>
                        <a class="btn btn-outline-light" href="{{ route('funcionarios.index') }}" role="button">Voltar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
