<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Zona extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table='Zonas';
    protected $primaryKey = 'Id_zona';
    public $timestamps = false;
}
