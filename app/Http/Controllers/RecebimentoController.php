<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Recebimento;
use Illuminate\Http\Request;

class RecebimentoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$recebimentos = Recebimento::orderBy('id', 'desc')->paginate(10);

		return view('recebimentos.index', compact('recebimentos'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('recebimentos.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$recebimento = new Recebimento();

		$recebimento->Recebi = $request->input("Recebi");
        $recebimento->Data = $request->input("Data");
        $recebimento->Recebido = $request->input("Recebido");
        $recebimento->Repetir = $request->input("Repetir");
        $recebimento->Descrição = $request->input("Descrição");

		$recebimento->save();

		return redirect()->route('recebimentos.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$recebimento = Recebimento::findOrFail($id);

		return view('recebimentos.show', compact('recebimento'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$recebimento = Recebimento::findOrFail($id);

		return view('recebimentos.edit', compact('recebimento'));
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
		$recebimento = Recebimento::findOrFail($id);

		$recebimento->Recebi = $request->input("Recebi");
        $recebimento->Data = $request->input("Data");
        $recebimento->Recebido = $request->input("Recebido");
        $recebimento->Repetir = $request->input("Repetir");
        $recebimento->Descrição = $request->input("Descrição");

		$recebimento->save();

		return redirect()->route('recebimentos.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$recebimento = Recebimento::findOrFail($id);
		$recebimento->delete();

		return redirect()->route('recebimentos.index')->with('message', 'Item deleted successfully.');
	}

}
