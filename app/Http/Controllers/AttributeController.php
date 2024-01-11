<?php

namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index() 
    {
        $attributedata = Attribute::all();
        return view('attribute.attribute-list', ['attributes'=>$attributedata]);    
    }

    public function create()
    {
        return view('attribute.attribute-create');
    }



    public function store(Request $request)
        {
        $data = $request->validate([
            'name'=> 'required',
            'value' => 'required',
        
        ]);

        $attributedata = Attribute::create($data);
        return redirect()->back()->with('message' , 'Attribute created successfully');
        }
}
