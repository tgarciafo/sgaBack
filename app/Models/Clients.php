<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_code', 'description_client'
    ];

    public function users()
    {
        return $this->belongsTo(Users::class);
    }

    public $timestamps = false;
}
