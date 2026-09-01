@extends('layouts.app')
@section('title', 'Lista de Funcionários')
@section('content')

<h1>Lista de funcionários para {{ Auth::user()->name }}</h1>

<a class="btn btn-primary" href="{{ route('funcionarios.create') }}" role="button">Novo</a>

<table class="table">
    <thead class="table-info">
        <tr>
            <th>Nome</th>
            <th>Matrícula</th>
            <th>Cargo</th>
            <th>Setor</th>
            <th>Opções</th>
        </tr>
    </thead>
    <tbody>
        @foreach($funcionarios as $funcionario)
        <tr class="table-info">
            <td>{{ $funcionario->nome }}</td>
            <td>{{ $funcionario->matricula }}</td>
            <td>{{ $funcionario->cargo }}</td>
            <td>{{ $funcionario->setor_id }}</td>
            <td>
                <!-- Botão Editar -->
                <a class="btn btn-primary" href="{{ route('funcionarios.edit', $funcionario->id) }}" role="button">Editar</a>
                
                <!-- Botão Excluir -->
                <form action="{{ route('funcionarios.destroy', $funcionario->id) }}" method="post" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                </form>
            </td>
        </tr>    
        @endforeach  
    </tbody>
</table>

@endsection

