<?php

namespace App\Models;
use App\Models\Promotor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    public function promotor()
    {
        return $this->belongsTo(Promotor::class);
    }
}
