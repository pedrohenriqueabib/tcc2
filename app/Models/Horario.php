<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Horario extends Model {
    use HasFactory;

    protected $table = 'horario';
    protected $guarded = ['id'];
    protected $fillable = ['inicio', 'fim', 'dia_semana', 'carga_horaria'];

    public $timestamps = false;

    public function atividadeHorario(): HasMany {
        return $this->hasMany(AtividadeHorario::class);
    }

}
