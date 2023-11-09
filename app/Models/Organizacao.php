<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Organizacao extends Model
{
    use HasFactory;

    protected $table = 'organizacao';
    protected $fillable = ['nome', 'evento_id'];
    protected $guarded = ['id'];

    public $timestamps = false;

    public function evento(): BelongsTo
    {
        return $this->belongsTo(Evento::class);
    }
}
