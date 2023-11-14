<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InscricaoEvento extends Model {
    
    use HasFactory;
    protected $table = 'inscricao_evento';
    protected $guarded = ['id'];
    protected $fillable = ['participante_id', 'evento_id'];

    public $timestamps = false;

    public function evento(): BelongsTo {
        return $this->belongsTo(Evento::class);
    }

    public function participante(): BelongsTo {
        return $this->belongsTo(Participante::class);
    }
}
