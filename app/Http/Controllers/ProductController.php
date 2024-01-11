<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
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
        $dataAtt = Attribute::all();
        return view('products-create',['attributes'=>$dataAtt]);
    }

    public function store(Request $request)
    {
      $data = $request->validate([
          'name'=> 'required',
          'qty' => 'required|numeric',
          'price' => 'required|numeric| between:0,9999.99',
          'description'=> 'nullable',
          'photo' => 'required|image',
          'color'=>'required',
          'stuff'=> 'required'
      ]);
     
      // Generate product code
      $lastProduct = Product::orderBy('created_at', 'desc')->first();
      if ($lastProduct) {
          $prodCode = intval(substr($lastProduct->prod_code, 4));
          $prodCode++;
      } else {
          $prodCode = 1;
      }
      $prodCodeStr = str_pad($prodCode, 3, '0', STR_PAD_LEFT);
      $data['prod_code'] = 'prod' . $prodCodeStr;
    
      //image upload 
      $fileName = time().$request->file('photo')->getClientOriginalName();
      $path = $request->file('photo')->storeAs('image', $fileName , 'public');
      $data['photo'] = '/storage/'.$path;
    
    // //image upload and resize
    // $originalImage = $request->file('photo');
    // $fileName = time() . $originalImage->getClientOriginalName();
    
    //  original image
    // $originalImagePath = Image::make($originalImage)->resize(500, 500)->save(public_path('image/original/' . $fileName));
    
    //  medium image
    // $mediumImage = Image::make($originalImage)->resize(250, 250)->save(public_path('image/medium/' . $fileName));
    
    // large image
    // $largeImage = Image::make($originalImage)->resize(500, 500)->save(public_path('image/large/' . $fileName));
    // $path = $request->file('photo')->storeAs('image', $fileName , 'public');
    // $data['photo'] = '/storage/'.$path;
    
    
      $productsNew = Product::create($data );
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
