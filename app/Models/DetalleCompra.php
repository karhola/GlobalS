<?php

namespace App\Models;

use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Compra;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
    public function compra()
    {
        return $this->belongsTo(Compra::class);
    }
}
