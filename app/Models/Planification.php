<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planification extends Model
{
    use HasFactory;

    protected $fillable = [
        'data_sortida', 'sscc', 'albara_sortida', 'product_id', 'user_id'
    ];

    public function products()
    {
        return $this->belongsTo(Products::class);
    }

    public function users()
    {
        return $this->belongsTo(Users::class);
    }

    public $timestamps = false;

}
