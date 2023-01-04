<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    protected $table = 'subcategorias';

    protected $fillable = [
        'nombre',
        'imagen'
    ];
    public $timestamps = false;
}
