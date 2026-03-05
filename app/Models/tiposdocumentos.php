<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable; // <-- 1. IMPORTANTE: Añadir esta línea

class tiposdocumentos extends Model
{
    use HasFactory, Notifiable;


    protected $table = 'tbltiposdocumentos';
    protected $primaryKey = 'NIS';

    protected $fillable = [
        'Denominacion',
        'Observaciones',
        'TiposdocumentosPDF',
    ];

    public $timestamps = false;

    /**
     * Le decimos a Laravel a qué correo enviar siempre
     * para este modelo específico.
     */
    public function routeNotificationForMail($notification)
    {
        return 'caligomez294@gmail.com';
    }
}
