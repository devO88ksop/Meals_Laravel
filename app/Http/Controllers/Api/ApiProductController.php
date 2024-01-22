<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Interfaces\Api\ApiProductInterface;
use Illuminate\Http\Request;
use App\Interfaces\Api\CategoryInterface;
use Error;

class ApiProductController extends Controller
{
    private $a;

    public function __construct(ApiProductInterface $productInterface)
    {
        $this->a=$productInterface;
       
    }
    public function all()
    {
        $products = $this->a->all();
        // return view('admin.categories.index ',compact('categories'));
        // dd($categories->toArray());

        // return response()->json(['data'=>$categories,'status'=>200],);     
        // dd($categories);
        return ProductResource::collection($products);   


    }
    public function getProductById($id)
    {
        $products = $this->a->getProductById($id);
        
        return new ProductResource($products);
        // return CategoryResource::collection($categories);   

       
        
    }
    
}
