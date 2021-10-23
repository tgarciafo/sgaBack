<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id', 'ean', 'reference', 'description_prod', 'quantity'
    ];

    public function clients()
    {
        return $this->belongsTo(Clients::class);
    }

    public $timestamps = false;
}
