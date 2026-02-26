<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alternativasep extends Model
{
    use HasFactory;
//uiiuku
    protected $table = 'tblalternativasep';
    protected $primaryKey = 'NIS';

    protected $fillable = [
        'Nombre',
        'Descripcion',
        'AlternativasepPDF ;',
    ];

    public $timestamps = false;
}
//comentario para validAR EL REPOSITORIO
