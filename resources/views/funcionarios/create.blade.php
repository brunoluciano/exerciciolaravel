@extends('layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron bg-dark text-white py-4">
            <h1 class="display-3">Adicionar Funcionário</h1>
            <hr class="my-2 bg-info">
            <br>
            <form action="{{ route('funcionarios.store') }}" method="POST">
                @csrf
                <div class="form-group row">
                    <strong class="col-sm-2 col-form-label">Nome: </strong>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nome" maxlength="35" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <strong class="col-sm-2 col-form-label">Cargo: </strong>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="cargo" maxlength="20" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <strong class="col-sm-2 col-form-label">Data da Matricula: </strong>
                    <div class="col-sm-10">
                        <input type="date" class="form-control" name="data_matricula" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <strong class="col-sm-2 col-form-label">Salário: <span class="text-right">R$</span></strong>
                    <div class="col-md-10">
                        <input type="number" step="0.01" class="form-control" name="data_matricula" size="20" autocomplete="off">
                    </div>
                </div>
                <input type="submit" value="Cadastrar">
            </form>
        </div>
    </div>
</div>


@endsection