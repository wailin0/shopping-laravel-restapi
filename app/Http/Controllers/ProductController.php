<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return Product::all();
    }


    public function store(Request $request)
    {

        return Product::create($request->all());
    }


    public function show($id)
    {
        return Product::find($id);
    }


    public function search($name)
    {
        return Product::where('name', 'like', '%' . $name . '%')->get();
    }


    public function update(Request $request, $id)
    {
        return Product::where('id', $id)->update($request->all());
    }

    public function destroy($id)
    {
        return Product::destroy($id);
    }
}
