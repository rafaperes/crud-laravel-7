<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\product\StoreProductRequest;
use App\Http\Requests\product\UpdateProductRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Produtos';
        $products = Product::all();

        return view('products.index', compact('title', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Novo Produto';

        return view('products.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $image = $request->image->store('products');

        $product = new Product;
        $product->name = $request->name;
        $product->slug = Str::slug($request->name, '-');;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->image = $image;

        $product->save();

        return redirect()->route('/')->with('success', 'Produto salvo.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $title = 'Editar produto: ' . $product->name;

        return view('products.edit', compact('title', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::find($id);

        if (isset($request->image)) {
            Storage::delete($product->image);
            $product->image = $request->image->store('products');
        }

        $product->name = $request->name;
        $product->slug = Str::slug($request->name, '-');;
        $product->price = $request->price;
        $product->description = $request->description;

        $product->save();

        return redirect()->route('product.edit', $id)->with('success', 'Produto atualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        Storage::delete($product->image);
        return redirect()->route('/')->with('success', 'Produto deletado.');
    }
}
