<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Evento extends Model
{
    use HasFactory;

    protected $table = 'evento';
    protected $fillable = ['nome', 'descricao', 'edicao', 'endereco', 'site', 'data_inicio', 'data_fim'];
    protected $guarded = ['id'];

    public $timestamps = false;

    public function organizacao() {
        return $this->hasOne(Organizacao::class);
    }

    public function endereco() {
        return $this->hasOne(Endereco::class);
    }

    public function atividades(): HasMany
    {
        return $this->hasMany(Atividade::class);
    }

    public function inscricaoEvento(): HasMany
    {
        return $this->hasMany(InscricaoEvento::class);
    }
}
