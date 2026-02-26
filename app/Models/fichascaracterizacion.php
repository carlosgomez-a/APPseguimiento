<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fichascaracterizacion extends Model
{
    use HasFactory;

    protected $table = 'tblfichascaracterizacion';
    protected $primaryKey = 'NIS';

    protected $fillable = [
        'Codigo',
        'Denominacion',
        'Cupo',
        'FechaInicio',
        'FechaFin',
        'Observaciones',
        'tblcentroformacion_NIS',
        'tblprogramasdeformacion_NIS',
    ];

    public $timestamps = false;
}
