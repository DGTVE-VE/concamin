<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class Escuelas extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'escuelas';

    public $timestamps = false;

    protected $fillable = [
        'tipo_educativo', 'entidad', 'municipio', 'clave', 'centro_educativo', 'control',
    ];
}
