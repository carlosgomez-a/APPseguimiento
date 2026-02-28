<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subalternativasep extends Model
{
    use HasFactory;
    protected $table = 'tblsubalternativasep';
    protected $primaryKey = 'NIS';

    protected $fillable = [

        'Nombre',
        'Descripcion',
        'Subalternativasep',
    ];

    public $timestamps = false;
}
