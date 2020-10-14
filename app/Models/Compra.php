<?php

namespace App\Models;

use App\Models\Proveedor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
