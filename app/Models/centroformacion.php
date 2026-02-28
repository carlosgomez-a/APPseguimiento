<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class centroformacion extends Model
{
    use HasFactory;

    protected $table = 'tblcentroformacion';
    protected $primaryKey = 'NIS';

    protected $fillable = [
        'Codigo',
        'Denominacion',
        'Observaciones',
        'Direccion',
        'tblregionales_NIS',
        'CentroformacionPDF',
    ];

    public $timestamps = false;
}
