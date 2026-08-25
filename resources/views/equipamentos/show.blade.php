<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Equipamento</title>
    <link href="https://jsdelivr.net" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Detalhes do Equipamento</h1>

    <div class="card mb-4">
        <div class="card-header bg-dark text-white">
            <h5 class="card-title mb-0">{{ $equipamento->nome }}</h5>
        </div>
        <div class="card-body">
            <p><strong>ID:</strong> {{ $equipamento->id }}</p>
            <p><strong>Patrimônio:</strong> {{ $equipamento->patrimonio }}</p>
            <p><strong>Setor (ID):</strong> {{ $equipamento->setor_id }}</p>
            <p>
                <strong>Status:</strong> 
                <span class="badge 
                    {{ $equipamento->status == 'ativo' ? 'bg-success' : '' }}
                    {{ $equipamento->status == 'inativo' ? 'bg-danger' : '' }}
                    {{ $equipamento->status == 'manutencao' ? 'bg-warning text-dark' : '' }}
                ">
                    {{ ucfirst($equipamento->status) }}
                </span>
            </p>
        </div>
    </div>

    <div class="d-flex gap-2">
        <a href="{{ route('equipamentos.index') }}" class="btn btn-secondary">Voltar</a>
        <a href="{{ route('equipamentos.edit', $equipamento) }}" class="btn btn-warning">Editar</a>
        
        <form action="{{ route('equipamentos.destroy', $equipamento) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
    </div>
</div>

</body>
</html>
