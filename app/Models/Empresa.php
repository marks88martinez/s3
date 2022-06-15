<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nombre_empresa',
        'sitio_web',
        'telefono',
        'email',
        'tipo_documento',
        'num_documento',
        'status',
    ];


    public function users(){
        return $this->hasMany(User::class);
    }
    public function responsables(){
        return $this->hasMany(Responsable::class);
    }
    public function direcciones(){
        return $this->hasMany(Direccione::class);
    }
    public function rma(){
        return $this->hasMany(Rma::class);
    }
    // public function direcciones(){
    //     return $this->hasMany('App\Models\Direccione');
    // }


}
