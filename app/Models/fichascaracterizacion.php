<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fichascaracterizacion extends Model
{
    use HasFactory;

    protected $table = 'tblfichascaracterizacion';
    protected $primaryKey = 'NIS';
    public $timestamps = false;

    protected $fillable = [
        'Codigo',
        'Denominacion',
        'Cupo',
        'FechaInicio',
        'FechaFin',
        'Observaciones',
        'tblcentroformacion_NIS',
        'tblprogramasdeformacion_NIS',
        'FichascaracterizacionPDF',
    ];



    public function centroformacion()
    {
        // Relación con la tabla de Centros
        return $this->belongsTo(centroformacion::class, 'tblcentroformacion_NIS', 'NIS');
    }

    public function programaformacion()
    {
        // Relación con la tabla de Programas
        return $this->belongsTo(programasdeformacion::class, 'tblprogramasdeformacion_NIS', 'NIS');
    }
}
