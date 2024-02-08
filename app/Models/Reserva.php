<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Reserva extends Model
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table='reserva_mesa';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'turno',
        'tipo_mesa',
        'reservat',
        'usuario',
    ];

}