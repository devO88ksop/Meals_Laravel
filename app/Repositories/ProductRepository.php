<?php

namespace App\Repositories;
use App\Models\Product;
use App\Interfaces\ProductInterface;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
// use App\Repositories\ProductRepository;

class ProductRepository implements ProductInterface{

    public function all(){
        return Product::all();
    }
    public function store($request){

       

        $products = new Product;

     
        $this->productValidationCheck($request);
        $imageName = time().'.'.$request->image->extension();  

    
        $product = new Product;
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        
        // Save the image to the public/images directory
        $request->image->move(public_path('images'), $imageName);
    
        $product->image = $imageName;
    
        $product->price = $request->price;
        $product->save();    
    }

    public function findById($id){
        return Product::findOrFail($id);

    } 
    public function update($id){
        $product = $this->findById($id);
        $product->name = request()->name;
        $product->category_id = request()->category_id;
        $product->price = request()->price;
        $product->description = request()->description;
        $product->update();

    }
    public function destroy($id){
        $product = $this->findById($id);
        $product->delete();

    }
    // validation Check 
    
    private function productValidationCheck($request){
        
      return $request ->validate([
            'name'=> 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png',

       ]);

    }

}