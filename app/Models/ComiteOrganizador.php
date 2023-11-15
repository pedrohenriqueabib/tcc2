<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ComiteOrganizador extends Model {
    use HasFactory;

    protected $table = 'comite_organizador';
    protected $guarded = ['id'];
    protected $fillable = ['comite_id','organizador_id'];
    
    public $timestamps = false;

    public function organizadores(): BelongsToMany {
        return $this-> belongsToMany(Organizador::class);
    }

    public function comites(): BelongsToMany {
        return $this->belongsToMany(Comite::class);
    }

}
