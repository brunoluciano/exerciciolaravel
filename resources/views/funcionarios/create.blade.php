@extends('layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron bg-dark text-white py-4">
            <h1 class="display-3">Adicionar Funcionário</h1>
            <hr class="my-2 bg-info">
            <br>
            <form action="{{ route('funcionarios.store') }}" method="POST">
                {{ csrf_field() }}
                <div class="form-group row">
                    <div class="field">
                        <strong class="col-sm-2 col-form-label">Nome: </strong>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nome" maxlength="35" size="25" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="field">
                    <strong>Cargo: </strong>
                    <div class="control">
                        <input type="text" class="input" name="cargo" maxlength="20" autocomplete="off">
                    </div>
                </div>
                <div class="field">
                    <strong>Data da Matricula: </strong>
                    <div class="control">
                        <input type="date" class="date" name="data_matricula" autocomplete="off">
                    </div>
                </div>
                <div class="field">
                    <strong>Salário: </strong>
                    <div class="control">
                        <strong>R$</strong>
                        <input type="number" step="0.01" class="date" name="data_matricula" autocomplete="off">
                    </div>
                </div>
                <input type="submit" value="Cadastrar">
            </form>
        </div>
    </div>
</div>


@endsection