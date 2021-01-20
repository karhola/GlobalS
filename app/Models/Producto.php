<?php

namespace App\Models;

use App\Models\Categoria;
use App\Models\DetalleVenta;
use App\Models\Producto;
use App\Models\Compra;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function detalleventas()
    {
        return $this->belongsToMany(DetalleVenta::class);
    }

    public function pedidos()
    {
        return $this->belongsTo(Producto::class);
    }



}
