<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'tipo',
        'url',
        'rma_id'
    ];

    public function rma(){
        return $this->belongsTo(Rma::class);
    }
}
