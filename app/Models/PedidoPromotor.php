<?php

namespace App\Models;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoPromotor extends Model
{
    use HasFactory;
    public function productos(){
        return $this->belongsTo(Producto::class);
    }
    
}
