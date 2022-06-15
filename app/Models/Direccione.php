<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direccione extends Model
{
    use HasFactory;

    // protected $table = 'direcciones';
    // protected $primaryKey = 'id';


    protected $fillable = [
        'nombre_lugar',
        'codigo_postal',
        'pais',
        'ciudad',
        'calle',
        'empresa_id',
        'user_id',

    ];
    public function empresa(){
        return $this->belongsTo('App\Models\Empresa');
    }
    // public function rmas(){
    //     return $this->belongsTo(Rma::class, 'id');
    // }
}
