<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instructores extends Model
{
    use HasFactory;

    protected $table = 'tblinstructores';
    protected $primaryKey = 'NIS';

    protected $fillable = [
        'TipoDoc',
        'NumeroDoc',
        'Nombres',
        'Apellidos',
        'Direccion',
        'Telefono',
        'CorreoInstitucional',
        'CorreoPersonal',
        'Sexo',
        'FechaNacimiento',
        'tbltiposdocumentos_NIS',
        'tbleps_NIS',
        'tblrolesadministrativos_NIS',
    ];

    public $timestamps = false;
}
