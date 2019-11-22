@extends('layout')
@section('content')
<div class="row">
        <div class="col-md-12">
            <div class="jumbotron bg-dark text-white py-4">
                <h1>Editar nível <i class="display-3">{{ $level->descricao }}</i></h1>
                <hr class="my-2 bg-info">
                <div class="row justify-content-center">
                    <div class="col-md-10 mt-3">
                        <div class="jumbotron bg-secondary pt-5 pb-0 border border-white">
                            <form action="{{ route('levels.update', $level->id) }}" method="POST" class="mt-0">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2 col-form-label text-right">Descrição</label>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" name="descricao" placeholder="Descrição do nível" value="{{ $level->descricao }}" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-md-2 col-form-label text-right">Porcentagem</label>
                                    <div class="col-md-10">
                                        <div class="input-group mb-3">
                                            <input type="number" step="0.01" class="form-control" name="percAumento" placeholder="Porcentagem que o salário aumentará de acordo com seu respectivo cargo" value="{{ $level->percAumento }}" autocomplete="off" required>
                                            <div class="input-group-append">
                                                <span class="input-group-text"><b>%</b></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-10 offset-md-2">
                                        <hr class="bg-white">
                                        <input type="submit" class="btn btn-info" value="Atualizar">
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
