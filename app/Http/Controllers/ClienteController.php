<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePostRequest;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clientes = Cliente::paginate(5);
        return view('cliente.index')->with('clientes', $clientes);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cliente.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SavePostRequest $request)
    {
        /*$request->validate([
            'name' => 'required|max:15',
            'deuda' => 'required|gte:50'
        ]);*/

        $cliente = Cliente::create($request->validated());

        Session::flash('mensaje', 'Cliente creado!');
        return to_route('cliente.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cliente $cliente)
    {
        return view('cliente.form')->with('cliente', $cliente);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SavePostRequest $request, Cliente $cliente)
    {
        $cliente->update($request->validated());

        Session::flash('mensaje', 'Cliente editado!');
        return to_route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        Session::flash('mensaje', 'Cliente eliminado!');
        return to_route('cliente.index');
    }
}
