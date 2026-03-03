<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class programasdeformacion extends Model
{
    use HasFactory;

    protected $table = 'tblprogramasdeformacion';
    protected $primaryKey = 'NIS';

    public $incrementing = true;
    protected $keyType = 'int';

    protected $fillable = [
        'Codigo',
        'Denominacion',
        'Observaciones',
        'ProgramasdeformacionPDF',
    ];

    public $timestamps = false;
}
