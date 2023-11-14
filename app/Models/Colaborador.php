<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Colaborador extends Model {
    use HasFactory;

    protected $table = 'colaborador';
    protected $guarded = ['id'];
    protected $fillable = ['nome', 'telefone', 'email', 'descricao'];
    
    public $timestamps = false;

    public function colaboradorAtividade(): HasMany {
        return $this->hasMany(ColaboradorAtividade::class);
    }

}
