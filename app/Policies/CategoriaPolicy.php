<?php

namespace App\Policies;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoriaPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        //
    }

    public function view(User $user, Categoria $categoria)
    {
        return auth()->user()->hasRole('Admin');
    }

    public function create(User $user)
    {
        return auth()->user()->hasRole('Admin');
    }

    public function update(User $user, Categoria $categoria)
    {
        return auth()->user()->hasRole('Admin');
    }

    public function delete(User $user, Categoria $categoria)
    {
        return auth()->user()->hasRole('Admin');
    }

    public function restore(User $user, Categoria $categoria)
    {
        //
    }

    public function forceDelete(User $user, Categoria $categoria)
    {
        //
    }
}
