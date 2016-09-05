<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Pagar;
use Illuminate\Http\Request;

class PagarController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$pagars = Pagar::orderBy('id', 'desc')->paginate(10);

		return view('pagars.index', compact('pagars'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('pagars.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param Request $request
	 * @return Response
	 */
	public function store(Request $request)
	{
		$pagar = new Pagar();

		$pagar->title = $request->input("title");

		$pagar->save();

		return redirect()->route('pagars.index')->with('message', 'Item created successfully.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$pagar = Pagar::findOrFail($id);

		return view('pagars.show', compact('pagar'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$pagar = Pagar::findOrFail($id);

		return view('pagars.edit', compact('pagar'));
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
		$pagar = Pagar::findOrFail($id);

		$pagar->title = $request->input("title");

		$pagar->save();

		return redirect()->route('pagars.index')->with('message', 'Item updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$pagar = Pagar::findOrFail($id);
		$pagar->delete();

		return redirect()->route('pagars.index')->with('message', 'Item deleted successfully.');
	}

}
