<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pessoa;
use Illuminate\Http\Request;

class PessoaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pessoas = Pessoa::orderBy('id', 'desc')->paginate(10);

		return view('pessoas.index', compact('pessoas'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('pessoas.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$pessoa = new Pessoa();

		$pessoa->nome = $request->input("nome");
        $pessoa->endereco = $request->input("endereco");

		$pessoa->save();

		return redirect()->route('pessoas.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$pessoa = Pessoa::findOrFail($id);

		return view('pessoas.show', compact('pessoa'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pessoa = Pessoa::findOrFail($id);

		return view('pessoas.edit', compact('pessoa'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @param Request $request
	 * @return Response
	 */
	public function update(Request $request, $id)
	{
		$pessoa = Pessoa::findOrFail($id);

		$pessoa->nome = $request->input("nome");
        $pessoa->endereco = $request->input("endereco");

		$pessoa->save();

		return redirect()->route('pessoas.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$pessoa = Pessoa::findOrFail($id);
		$pessoa->delete();

		return redirect()->route('pessoas.index')->with('message', 'Item deleted successfully.');
	}

}
