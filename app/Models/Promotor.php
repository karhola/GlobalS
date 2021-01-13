<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pedido;

class Promotor extends Model
{
    use HasFactory;

    public function pedidos()
    {
        return $this->belongsToMany(Pedido::class);
    }
}
