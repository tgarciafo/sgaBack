<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Palets extends Model
{
    use HasFactory;

    protected $fillable = [
        'sscc', 'product_id', 'data_entrada', 'client_id', 'albara_entrada', 'lot', 'qty', 'caducitat', 'albara_sortida', 'data_sortida', 'location_id'
    ];

    public function clients()
    {
        return $this->belongsTo(Clients::class);
    }

    public function products()
    {
        return $this->belongsTo(Products::class);
    }

    public function locations()
    {
        return $this->belongsTo(Locations::class);
    }

    public $timestamps = false;
}
