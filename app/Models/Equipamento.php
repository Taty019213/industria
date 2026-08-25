<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'nome',
        'patrimonio',
        'setor_id',
        'status',
    ];

    public function setor()
    {
        return $this->belongsTo(Setor::class);
    }
}

