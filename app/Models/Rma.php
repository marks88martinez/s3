<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rma extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'sku',
        'serial',
        'fecha',
        'comprado_de',
        'descripcion',
        'estado',
        'user_id',
        'producto_id',
        'empresa_id',
        'direccion_id',
        'num_lote',

    ];

    public function empresa(){
        return $this->belongsTo(Empresa::class);
    }
    // public function responsable(){
    //     return $this->belongsTo(Responsable::class);
    // }
    public function user(){
        return $this->belongsTo(User::class);
    }
    // public function direccion(){
    //     return $this->belongsTo(Direccion::class);
    // }
    // public function envio(){
    //     return $this->belongsTo(Direccion::class);
    // }


}
