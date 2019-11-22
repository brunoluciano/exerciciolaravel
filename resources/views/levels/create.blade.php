@extends('layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron bg-dark text-white py-4">
            <h1>Inserir Nível</h1>
            <hr class="my-2 bg-info">
            <div class="row justify-content-center">
                <div class="col-md-10 mt-3">
                    <div class="jumbotron bg-secondary pt-5 pb-0 border border-white">
                        <form action="{{ route('levels.store') }}" method="POST" class="mt-0">
                            @csrf

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-2 col-form-label text-right">Descrição</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="descricao" placeholder="Nome do nível" autocomplete="off" required>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-2 col-form-label text-right">Porcentagem</label>
                                <div class="col-md-10">
                                    <div class="input-group mb-3">
                                        <input type="number" step="0.01" class="form-control" name="percAumento" placeholder="Porcentagem que o salário aumentará de acordo com seu respectivo cargo" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text"><b>%</b></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-10 offset-md-2">
                                    <hr class="bg-white">
                                    <input type="submit" class="btn btn-info" value="Inserir">
                                    <input type="reset" class="btn btn-dark" value="Limpar">
                                </div>
                            </div>
                        </form>
                    </div>
                    <a class="btn btn-outline-light" href="{{ route('levels.index') }}" role="button">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
