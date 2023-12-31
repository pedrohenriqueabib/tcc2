<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InscricaoAtividade extends Model {
    
    use HasFactory;
    protected $table = 'inscricao_atividade';
    protected $guarded = ['id'];
    protected $fillable = ['participante_id', 'atividade_id'];

    public $timestamps = false;

    public function atividade(): BelongsTo {
        return $this->belongsTo(Atividade::class);
    }

    public function participante(): BelongsTo {
        return $this->belongsTo(Participante::class);
    }
    
}
