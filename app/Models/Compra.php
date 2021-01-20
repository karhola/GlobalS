<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Producto;
use App\Models\Proveedor;

class Compra extends Model
{
    use HasFactory;

    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }

    public function proveedors()
    {
        return $this->belongsTo(Proveedor::class);
    }

}
