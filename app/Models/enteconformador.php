<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class enteconformador extends Model
{
    use HasFactory;

    protected $table = 'tblenteconformador';
    protected $primaryKey = 'NIS';

    protected $fillable = [
        'TipoDoc',
        'NumeroDoc',
        'RazonSocial',
        'Direccion',
        'Telefono',
        'CorreoInstitucional',
        'EnteconformadorPDF',
    ];

    public $timestamps = false;
}
