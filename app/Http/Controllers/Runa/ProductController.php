<?php

namespace App\Http\Controllers\Runa;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('runa.products.index', compact('products'));
    }

    public function create()
    {
		return view('runa.products.create');
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

    	return redirect(route('runa.product.index'));
    }

    public function edit(Product $product)
    {
        return view('runa.products.edit', compact('product'));
	}

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'unity' => 'required',
            'price' => 'required',
            'family' => 'required',
            'quantity' => 'required',
        ]);

        Product::find($request->id)->update($request->all());

        return redirect(route('runa.product.index'));
    }
}
