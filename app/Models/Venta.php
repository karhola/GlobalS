<?php

namespace App\Models;
use App\Models\Promotor;
use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    public function promotor()
    {
        return $this->belongsTo(Promotor::class);
    }

    public function productos()
    {
        return $this->belongsToMany(Producto::class)->withPivot('cantidad', 'subtotal', 'beneficio_subtotal_promotor', 'beneficio_subtotal_oficina');
    }
}
