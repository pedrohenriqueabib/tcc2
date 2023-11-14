<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comite extends Model {
    
    use HasFactory;
    protected $table = 'comite';
    protected $guarded = ['id'];
    protected $fillable = ['nome', 'descricao'];

    public $timestamps = false;

    public function organizacao(): BelongsTo {
        return $this->belongsTo(Organizacao::class);
    }

    public function comiteOrganizador(): HasMany {
        return $this->hasMany(ComiteOrganizador::class);
    }

}
