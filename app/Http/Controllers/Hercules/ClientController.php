<?php

namespace App\Http\Controllers\Hercules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Hercules\HClient;

class ClientController extends Controller
{
    function index()
    {
        $clients = HClient::all();
        return view('hercules.clients.index', compact('clients'));
    }
    
    function create()
	{
		return view('hercules.clients.create');
	}

	public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|unique:clients',
    		'city' => 'required',
    		'phone' => 'required'
    	]);

    	HClient::create($request->all());

        return redirect('hercules/clientes');
    }


	function edit(HClient $hclient)
    {
        return view('hercules.clients.edit', compact('hclient'));
	}

    public function update(Request $request)
    {
        $this->validate($request, [
			'name' => 'required',
    		'city' => 'required',
    		'phone' => 'required',
        ]);

        HClient::find($request->id)->update($request->all());

        return $this->index();
    }

	function destroy($id)
	{
		HClient::destroy($id);

		return back();
	}
}
