<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Organizador extends Model {
    
    use HasFactory;
    protected $table = 'organizador';
    protected $fillable = ['nome', 'telefone', 'email', 'cargo', 'matricula'];
    protected $guarded = ['id'];

    public $timestamps = false;

    public function comiteOrganizador(): HasMany {
        return $this->hasMany(ComiteOrganizador::class);
    }

}
