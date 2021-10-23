<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blocked extends Model
{
    use HasFactory;

    protected $fillable = [
        'sscc'
    ];

    public function palets()
    {
        return $this->belongsTo(Palets::class);
    }

    public $timestamps = false;
}
