@extends('layout')
@section('content')
    <div class="row">
        <div class="col-md-12">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <h4 class="alert-heading mb-0">{{ $message }}</h4>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="jumbotron bg-dark text-white py-4">
                <h1 class="display-3">Funcionários</h1>
                <hr class="my-2 bg-info">
                @if ($funcionarios->count() > 0)
                    <a href="{{ route('funcionarios.create') }}" class="btn btn-success mb-2" role="button">
                        <i class="fa fa-plus" aria-hidden="true"></i> Novo
                    </a>
                    <table class="table table-info table-striped table-hover text-center">
                        <thead class="bg-primary text-white">
                            <tr>
                                <th>ID</th>
                                <th>NOME</th>
                                <th>CARGO</th>
                                <th>DATA MATRÍCULA</th>
                                <th>SALÁRIO</th>
                                <th>OPERAÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($funcionarios as $funcionario)
                                <tr>
                                    <th scope="row">{{ $funcionario->id }}</th>
                                    <td>{{ $funcionario->nome }}</td>
                                    <td>{{ $funcionario->cargo }}</td>
                                    <td>{{ date('d/m/Y h:m', strtotime($funcionario->data_matricula))}}</td>
                                    <td>R$ {{ $funcionario->salario }}</td>
                                    <td>
                                        <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="POST">
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('funcionarios.show', $funcionario->id) }}" class="btn btn-secondary btn-sm" role="button" data-toggle="tooltip" data-placement="top" title="Exibir">
                                                    <i class="fa fa-search" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('funcionarios.edit', $funcionario->id) }}" class="btn btn-warning btn-sm" role="button" data-toggle="tooltip" data-placement="top" title="Editar">
                                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                                </a>

                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Deseja realmente remover o funcionário {{ $funcionario->nome }}?')" data-toggle="tooltip" data-placement="top" title="Excluir">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </button>
                                            </div>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                @else
                    <br>
                    <div class="alert alert-warning p-4" role="alert">
                        <h2 class="alert-heading">Nenhum Funcionário!</h2>
                        <p></p>
                        <hr>
                        <p class="mb-0">Não possui nenhum funcionário inserido no Banco de Dados até o momento. Clique em <b>Novo</b> para adicionar um.</p>
                        <br>
                        <a href="{{ route('funcionarios.create') }}" class="btn btn-success" role="button">
                            <i class="fa fa-plus" aria-hidden="true"></i> Novo
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
