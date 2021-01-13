<?php

namespace App\Models;

use App\Models\Producto;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public function productos()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
