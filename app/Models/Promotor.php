<?php

namespace App\Models;

use App\Models\Pedido;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Promotor extends Model
{
    use HasFactory;

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class);
    }
}
