<?php

namespace App\Models;

use App\Models\Proveedor;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
 
}
