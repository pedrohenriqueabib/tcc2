<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Atividade extends Model {
    use HasFactory;
    protected $table = 'atividade';
    protected $guarded = ['id'];
    protected $fillable = ['nome', 'descricao', 'palavras_chaves', 'area', 'subarea', 'carga_horaria'];
    
    public $timestamps = false;

    public function responsavel(): BelongsTo {
        return $this->belongsTo(Responsavel::class);
    }

    public function evento(): BelongsTo {
        return $this->belongsTo(Evento::class);
    }
    
    public function atividadeHorario(): HasMany {
        return $this->hasMany(AtividadeHorario::class);
    }

    public function inscricaoAtividade(): HasMany {
        return $this->hasMany(InscricaoAtividade::class);
    }

    public function colaboradorAtividade(): HasMany {
        return $this->hasMany(ColaboradorAtividade::class);
    }

}
