<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Request;
use App\Interfaces\Api\CategoryInterface;
use App\Interfaces\ProductInterface;
use Error;

class CategoryController extends Controller
{
    private $b;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->b=$categoryInterface;
       
    }
    public function all()
    {
        $categories = $this->b->all();
        // return view('admin.categories.index ',compact('categories'));
        // dd($categories->toArray());

        // return response()->json(['data'=>$categories,'status'=>200],);     
        // dd($categories);
        return CategoryResource::collection($categories);   


    }
    public function getCategoryById($id)
    {
        $categories = $this->b->getCategoryById($id);
        
        return new CategoryResource($categories);
        // return CategoryResource::collection($categories);   

       
        
    }
    
}
