<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() 
    {
        $productsView = Product::all();
        return view('products', ['products'=>$productsView]);    
    }

    public function create()
    {
        return view('products-create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=> 'required',
            'qty' => 'required|numeric',
            'price' => 'required|numeric',
            'description'=> 'nullable',
            'photo' => 'required|image',
            'color'=>'required',
            'stuff'=> 'required'
        ]);

        //image upload 
        $fileName = time().$request->file('photo')->getClientOriginalName();
        $path = $request->file('photo')->storeAs('image', $fileName , 'public');
        $data['photo'] = '/storage/'.$path;
        $productsNew = Product::create($data);
        return redirect('products');
    }
  
    public function edit(Product $product)
    {
        return view('products-edit', ['product'=>$product]);
    }

    public function update(Product $product, Request $request)
    {
            $data = $request->validate([
                'name'=> 'required',
                'qty' => 'required|numeric',
                'price' => 'required|numeric',
                'description'=> 'nullable'
            ]);
            $product->update($data);
        return redirect('products')->with('success', 'Input updated successfully');
    }

    public function delete(Product $product){
        $product->delete();

        return redirect('products');
    }



}
