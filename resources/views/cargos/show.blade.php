@extends('layout')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="jumbotron bg-dark text-white py-4">
            <h1>Cargo <i class="display-3">{{ $cargo->descricao }}</i></h1>
            <hr class="my-2 bg-info">
            <div class="row justify-content-center">
                <div class="col-md-10 mt-3">
                    <div class="jumbotron bg-secondary pt-5 pb-0 border border-white">
                        <form action="{{ route('cargos.store') }}" method="POST" class="mt-0">
                            @csrf

                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-2 col-form-label text-right">Cargo</label>
                                <div class="col-md-10">
                                <input type="text" class="form-control" value="{{ $cargo->descricao }}" disabled>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-md-2 col-form-label text-right">Salário</label>
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">R$</div>
                                        </div>
                                        <input type="number" step="0.01" class="form-control" value="{{number_format($cargo->salarioBase,2,'.','')}}" disabled>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <a class="btn btn-outline-light" href="{{ route('cargos.index') }}" role="button">Voltar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
