<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Equipamentos</title>
    <link href="https://jsdelivr.net" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h1 class="mb-4">Cadastrar Equipamento</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('equipamentos.store') }}">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Patrimônio</label>
            <input type="text" name="patrimonio" class="form-control" value="{{ old('patrimonio') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Setor</label>
            <select name="setor_id" class="form-select">
                <option value="">Selecione um setor</option>
                @foreach ($setores as $setor)
                    <option value="{{ $setor->id }}" {{ old('setor_id') == $setor->id ? 'selected' : '' }}>
                        {{ $setor->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="">Selecione um status</option>
                <option value="ativo" {{ old('status') == 'ativo' ? 'selected' : '' }}>Ativo</option>
                <option value="inativo" {{ old('status') == 'inativo' ? 'selected' : '' }}>Inativo</option>
                <option value="manutencao" {{ old('status') == 'manutencao' ? 'selected' : '' }}>Manutenção</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="{{ route('equipamentos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

</body>
</html>
