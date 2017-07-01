<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function create()
	{
		return view('products.create');
	}

	public function store(Request $request)
    {
    	$this->validate($request, [
    		'name' => 'required|unique:products',
    		'unity' => 'required',
    		'price' => 'required',
    		'family' => 'required',
    		'quantity' => 'required',
    	]);

    	$product = Product::create($request->all());

    	return redirect(route('product.show'));
    }

    public function show()
    {
        $products = Product::get([
            'id', 'name', 'unity', 'price', 'family', 'quantity'
        ]);

        return view('products.show', compact('products'));
    }
}
