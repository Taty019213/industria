<?php

namespace App\Models;

use App\Models\Equipamento;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class ChamadoManutencao extends Model
{
    protected $table = 'chamados_manutencao';

    protected $fillable = [
        'titulo',
        'status',
        'equipamento_id',
        'user_id',
    ];

    public function equipamento(): BelongsTo
    {
        return $this->belongsTo(Equipamento::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
