<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Responsavel extends Model {
    use HasFactory;

    protected $table = 'responsavel';
    protected $guarded = ['id'];
    protected $fillable = ['nome', 'telefone', 'email', 'cargo', 'matricula'];
    
    public $timestamps = false;

    public function atividades(): HasMany {
        return $this->hasMany(Atividade::class);
    }
}
