<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Interfaces\ProductInterface;

class ProductController extends Controller
{
    public function __construct(
        private ProductInterface $productInterface
    ){

    }
    public function index()
    {       

        // dd('hi controller');
        $products=$this->productInterface->all();
        $categories=Category::all();
        return view('admin.products.index',compact('products','categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        
        $categories=Category::all();
        return view('admin.products.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->ValidationCheck($request);
        $this->productInterface->store($request);
        return redirect('products');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories=Category::all();
        $products=Product::findOrFail($id);
        return view('admin.products.edit',compact('products','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->productInterface->update($id);
        return redirect('products');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->productInterface->destroy($id);
        return redirect('products');
    }
    // for validation 
    private function ValidationCheck($request){
        return  $request->Validate([
            'name' => 'required',
            'category_id ' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required'

        ]);
    } 
}
