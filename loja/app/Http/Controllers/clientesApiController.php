<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class clientesApiController extends Controller
{
    public function index()
    {
        return Clientes::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $json = $request->getContent();

        return Clientes::create(
                                json_decode($json, JSON_OBJECT_AS_ARRAY)
                                );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cliente = Produtos::find($id);
        if($cliente){
            return $cliente;
        }else{
            return json_encode([$id =>'não existe']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cliente = Clientes::find($id);
        
        if($cliente){

            $json = $request->getContent();
            $atualizacao = json_decode($json, JSON_OBJECT_AS_ARRAY);
            $cliente->nome = $atualizacao['nome'];
            $cliente->endereco = $atualizacao['endereco'];
            $cliente->telefone = $atualizacao['telefone'];
            $cliente->email = $atualizacao['email'];


            $ret = $cliente->update() ? [$id => 'atualizado'] : [$id => 'erro ao atualizar'];
            

        }else {
            return json_encode([$id =>'não existe']);

        }return json_encode($ret); 
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Clientes::find($id);

        if($cliente){
            $ret = $cliente->delete() ? [$id => 'apagado'] : [$id => 'erro ao apagar'];



        }else {
            $ret = [$id => 'não existe'];

        }
        return json_encode($ret);
    }
    }

