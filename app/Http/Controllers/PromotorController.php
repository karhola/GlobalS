<?php

namespace App\Http\Controllers;

use App\Models\Promotor;
use Illuminate\Http\Request;

class PromotorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('promotor.index',[
            'promotors'=>Promotor::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('promotor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $promotor=new Promotor();
        $promotor->nombre_promotor=$request->nombre_promotor;
        $promotor->apellido_promotor=$request->apellido_promotor;
        $promotor->direccion_promotor=$request->direccion_promotor;
        $promotor->celular_promotor=$request->celular_promotor;
        $promotor->fecha_nacimiento=$request->fecha_nacimiento;
        $promotor->ci_promotor=$request->ci_promotor;
        $promotor->save();
        return redirect()->route('promotor.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotor  $promotor
     * @return \Illuminate\Http\Response
     */
    public function show(Promotor $promotor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotor  $promotor
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotor $promotor)
    {
        return view('promotor.edit',[
            'promotor'=>$promotor
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotor  $promotor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotor $promotor)
    {
  
        $promotor->nombre_promotor=$request->nombre_promotor;
        $promotor->apellido_promotor=$request->apellido_promotor;
        $promotor->direccion_promotor=$request->direccion_promotor;
        $promotor->celular_promotor=$request->celular_promotor;
        $promotor->fecha_nacimiento=$request->fecha_nacimiento;
        $promotor->ci_promotor=$request->ci_promotor;
        $promotor->update();
        return redirect()->route('promotor.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotor  $promotor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotor $promotor)
    {
        $promotor->delete();
        return redirect()->route('promotor.index');
    }
}
