<?php 
namespace App\Repositories\Api;

use App\Models\Category;
use GuzzleHttp\Psr7\Request;
use App\Interfaces\Api\CategoryInterface;



class CategoryRepository implements CategoryInterface{
    public function all()
    {
        // return Category::paginate()->all();
        // dd('Hello World');
        return Category::all();
        
    }
    public function getCategoryById($id)
    {
        return Category::find($id);
    }
    // public function store($request)
    // {
    //     dd(request()->all());
     
    //     $validated = $request->validate([
    //         'name' => 'required|unique:categories|max:255', 
    //     ]);
         
    //     $category = new Category();
    //     $category->name=request()->name;
    //     $category->save();
    // }
    // public function findById($id){
    //     return Category::findOrFail($id);

    // }
    // public function update($id)
    // {
    //     $categories = $this->findById($id);
    //     $categories->name = request()->name;
    //     $categories->update();
    // }
    // public function destroy($id)
    // {
    //     $categories = $this->findById($id);
    //     $categories->delete();
    // }


}
