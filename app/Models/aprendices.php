<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tiposdocumentos;
use App\Models\eps;
use App\Models\fichascaracterizacion;

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
        'AprendicesPDF',
    ];

    public $timestamps = false;

    // 🔗 RELACIONES

    public function tipoDocumento()
    {
        return $this->belongsTo(tiposdocumentos::class, 'tbltiposdocumentos_NIS', 'NIS');
    }

    public function eps()
    {
        return $this->belongsTo(eps::class, 'tbleps_NIS', 'NIS');
    }

    public function ficha()
    {
        return $this->belongsTo(fichascaracterizacion::class, 'tblfichascaracterizacion_NIS', 'NIS');
    }
}
