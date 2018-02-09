<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Requests;

use App\Http\Controllers\Controller;
use Redirect;



class ClientesController extends Controller
{
    public function index (){

    	$clientes = Cliente::get();

    	return view('clientes.lista', ['clientes' => $clientes]);


    }	

    public function novo () {
    	return view('clientes.formulario');
    }

    public function salvar (Request $request) {

    	

    	$cliente = new Cliente();

    	$cliente = $cliente->create($request->all());
    	\Session::flash('mensagem_sucesso', 'Cliente cadastrado com sucesso!');

    	return Redirect::to('clientes/novo');


    }

    public function editar($id) {

    	$cliente = Cliente::findOrFail($id);

    	return view('clientes.formulario', ['cliente' => $cliente]);
    }



    public function atualizar($id, Request $request){
    	// faz a verificação se o cliente está cadastrado. caso não ele da um erro em tela
    	$cliente = Cliente::findOrFail($id);

    	$cliente->update($request->all());

    	\Session::flash('mensagem_sucesso', 'Dados do Cliente atualizados com sucesso!');

    	return Redirect::to('clientes/'.$cliente->id.'/editar');

    }

    public function deletar($id){

    	
    	$cliente = Cliente::findOrFail($id);
    	$cliente->delete();
    	\Session::flash('mensagem_sucesso', 'Dados do Cliente foram apagados com sucesso!');
    	return Redirect::to ('/clientes');
    }

    


}
