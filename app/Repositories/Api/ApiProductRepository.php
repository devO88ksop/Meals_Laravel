<?php 
namespace App\Repositories\Api;

use App\Models\Category;
use GuzzleHttp\Psr7\Request;
use App\Interfaces\Api\ProductInterface;
use App\Interfaces\Api\ApiProductInterface;
use App\Models\Product;

class ApiProductRepository implements ApiProductInterface{
    public function all()
    {
        // return Category::paginate()->all();
        // dd('Hello World');
        return Product::all();
        
    }
    public function getProductById($id)
    {
        return Product::find($id);
    }
}