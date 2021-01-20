<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Producto;

class Pedido extends Model
{
    use HasFactory;

    public function productos()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
