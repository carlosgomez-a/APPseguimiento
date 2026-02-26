<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class aprendices extends Model
{
    use HasFactory;
    protected $table = 'tblaprendices';

    protected $primaryKey = 'NIS';


    protected $fillable = [

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
        'tblfichascaracterizacion_NIS',
    ];

    public $timestamps = false;
}
