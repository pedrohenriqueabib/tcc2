<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ColaboradorAtividade extends Model {
    
    use HasFactory;

    protected $table = 'colaborador_atividade';
    protected $guarded = ['id'];
    protected $fillable = ['colaborador_id', 'atividade_id'];
    
    public $timestamps = false;

    public function atividade(): BelongsTo {
        return $this->belongsTo(Atividade::class);
    }

    public function colaborador(): BelongsTo {
        return $this->belongsTo(Colaborador::class);
    }

}
