<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Equipamento</title>
    <link href="https://jsdelivr.net" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Editar Equipamento</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('equipamentos.update', $equipamento) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $equipamento->nome) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Patrimônio</label>
            <input type="text" name="patrimonio" class="form-control" value="{{ old('patrimonio', $equipamento->patrimonio) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Setor</label>
            <select name="setor_id" class="form-select">
                @foreach ($setores as $setor)
                    <option value="{{ $setor->id }}" {{ $equipamento->setor_id == $setor->id ? 'selected' : '' }}>
                        {{ $setor->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="ativo" {{ (old('status', $equipamento->status) == 'ativo') ? 'selected' : '' }}>Ativo</option>
                <option value="inativo" {{ (old('status', $equipamento->status) == 'inativo') ? 'selected' : '' }}>Inativo</option>
                <option value="manutencao" {{ (old('status', $equipamento->status) == 'manutencao') ? 'selected' : '' }}>Manutenção</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('equipamentos.index') }}" class="btn btn-secondary">Voltar</a>
    </form>
</div>

</body>
</html>

