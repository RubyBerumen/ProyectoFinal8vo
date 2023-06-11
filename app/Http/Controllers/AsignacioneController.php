<?php

namespace App\Http\Controllers;

use App\Asignacione;
use App\Departamento;
use App\Empleado;
use Illuminate\Http\Request;

/**
 * Class AsignacioneController
 * @package App\Http\Controllers
 */
class AsignacioneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $asignaciones = Asignacione::paginate();

        return view('asignacione.index', compact('asignaciones'))
            ->with('i', (request()->input('page', 1) - 1) * $asignaciones->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $asignacione = new Asignacione();
        $departamentos = departamento::pluck('nombre','id');
        $empleados = empleado::pluck('nombre','id');
        return view('asignacione.create', compact('asignacione','departamentos','empleados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Asignacione::$rules);

        $asignacione = Asignacione::create($request->all());

        return redirect()->route('asignaciones.index')
            ->with('success', 'Asignacione created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $asignacione = Asignacione::find($id);

        return view('asignacione.show', compact('asignacione'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $asignacione = Asignacione::find($id);
        $departamentos = departamento::pluck('nombre','id');
        $empleados = Empleado::pluck('nombre','id');
        return view('asignacione.edit', compact('asignacione','departamentos','empleados'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Asignacione $asignacione
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asignacione $asignacione)
    {
        request()->validate(Asignacione::$rules);

        $asignacione->update($request->all());

        return redirect()->route('asignaciones.index')
            ->with('success', 'Asignacione updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $asignacione = Asignacione::find($id)->delete();

        return redirect()->route('asignaciones.index')
            ->with('success', 'Asignacione deleted successfully');
    }
}
