<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;
    protected $connection = 'mysql';
    protected $table='Clientes';
    protected $primaryKey = 'Id_Cliente';
    public $timestamps = false;
}
