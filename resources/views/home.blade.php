@extends('layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border border-info bg-secondary text-white shadow-lg">
                <div class="card-header bg-dark display-4 p-4 text-center"><b>Empresa FEMA</b></div>

                <div class="card-body p-5">
                    {{-- @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Você está logado! --}}

                    <h2 class="font-weight-light">Gerenciamento de Funcionários</h2>

                    <hr class="bg-dark">

                    <div class="btn-group" role="group">
                        <a class="btn btn-success" href="{{ route('funcionarios.index') }}" role="button">Funcionários</a>
                        <a class="btn btn-info" href="{{ route('cargos.index') }}" role="button">Cargos</a>
                        <a class="btn btn-dark" href="{{ route('levels.index') }}" role="button">Níveis</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
