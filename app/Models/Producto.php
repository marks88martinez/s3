<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $fillable = [
        'sku',
        'name',
        'estado',
        'photourl',
    ];

    public function rmas(){
        return $this->belongsTo(Rma::class);
    }
}
