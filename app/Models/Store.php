<?php

namespace App\Models;
use App\Models\Producto;
use App\Models\Categoria;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
