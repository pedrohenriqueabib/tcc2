<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Local extends Model {
    use HasFactory;

    protected $table = 'local';
    protected $guarded = ['id'];
    protected $fillable = ['nome', 'pavimento', 'bloco'];

    public $timestamps = false;

    public function atividadeHorario(): HasMany {
        return $this->hasMany(AtividadeHorario::class);
    }
}
