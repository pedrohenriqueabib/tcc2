<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AtividadeHorario extends Model {
    use HasFactory;

    protected $table = 'atividade_horario';
    protected $guarded = ['id'];
    protected $fillable = ['atividade_id', 'horario_id', 'local_id'];
    
    public $timestamps = false;
    
    public function atividade(): BelongsTo {
        return $this->belongsTo(Atividade::class);
    }

    public function local(): BelongsTo {
        return $this->belongsTo(Local::class);
    }

    public function horario(): BelongsTo {
        return $this->belongsTo(Horario::class);
    }
}
