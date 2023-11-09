<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\HasMany;


class Comite extends Model
{
    use HasFactory;
    protected $table = 'comite';
    protected $fillable = ['nome'];
    protected $guarded = ['id'];

    public $timestamps = false;

    public function comiteOrganizador(): HasMany
    {
        return $this->hasMany(ComiteOrganizador::class);
    }
}
