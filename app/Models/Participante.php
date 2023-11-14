<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Participante extends Model {
    use HasFactory;

    protected $table = 'participante';
    protected $guarded = ['id'];
    protected $fillable = ['nome', 'telefone', 'email'];
    
    public $timestamps = false;

    public function inscricaoAtividade(): HasMany {
        return $this->hasMany(InscricaoAtividade::class);
    }

    public function inscricaoEvento(): HasMany {
        return $this->hasMany(InscricaoEvento::class);
    }
    
}
