<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        return Product::with('brand')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'images' => 'required|array',
            'image_url' => 'required',
            'how_to_use' => 'required|string',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'price' => 'required',
            'stock' => 'required'
        ]);

        $brand = Brand::find($request->brand_id);
        if (!$brand) {
            return response('brand not found');
        }
        $product = $brand->products()->create($request->all());
        $product->images()->createMany($request->images);

        return new ProductResource($product);
    }

    public function show($id)
    {
        return new ProductResource(Product::find($id));
    }

    public function search($name)
    {
        return new ProductResource(Product::where('name', $name)->get()->first());
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
