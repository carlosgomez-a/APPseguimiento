<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class instructores extends Model
{
    use HasFactory;

    protected $table = 'tblinstructores';
    protected $primaryKey = 'NIS';

    // Desactivamos timestamps porque la tabla no tiene created_at y updated_at
    public $timestamps = false;

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
        'InstructoresPDF'
    ];

    // --- RELACIONES ---

    public function tiposdocumentos()
    {
        // Relación con la tabla de tipos de documentos
        return $this->belongsTo(tiposdocumentos::class, 'tbltiposdocumentos_NIS', 'NIS');
    }

    public function eps()
    {
        // Relación con la tabla de EPS
        return $this->belongsTo(eps::class, 'tbleps_NIS', 'NIS');
    }

    public function rolesadministrativos()
    {
        // Relación con la tabla de Roles Administrativos
        return $this->belongsTo(rolesadministrativos::class, 'tblrolesadministrativos_NIS', 'NIS');
    }
}
