<?php

namespace App\Repositories;

use App\Models\Product;
use App\Interfaces\ProductInterface;

class ProductRepository implements ProductInterface{

    public function all()
    {
        return Product::all();
    }
    public function store($request){
        // dd($request->all());
        $file=$request->file('image');
        $fileName=uniqid().$file->getClientOriginalName();
        $file->storeAs('public',$fileName);

        $products = new Product();
        $products->name = $request->name;
        $products->category_id = $request->category_id;
        $products->description=$request->description;
        $products->price=$request->price;
        $products->image=$fileName;
        $products->save();
    }
    public function findById($id){
        return Product::findOrfail($id);
    }
    public function update($id){
        $products=$this->findById($id);
        $products->price = request()->name;
        $products->category_id = request()->category_id;
        $products->description = request()->description;
        $products->price = request()->price;



        $products->update();

    }
    public function destroy($id){

        $products=$this->findById($id);
        $products->price = request()->name;
        $products->category_id = request()->category_id;
        $products->description = request()->description;
        $products->price = request()->price;
        $products->delete();
    }
}

?>
