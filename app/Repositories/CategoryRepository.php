<?php 
namespace App\Repositories;

use App\Models\Category;

use App\Interfaces\CategoryInterface;



class CategoryRepository implements CategoryInterface{
    public function all()
    {
        return Category::paginate()->all();
        
    }
    public function store($request)
    {
        // dd(request()->all());
     
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:255', 
        ]);
         
        $category = new Category();
        $category->name=request()->name;
        $category->save();
    }
    public function findById($id){
        return Category::findOrFail($id);

    }
    public function update($id)
    {
        $categories = $this->findById($id);
        $categories->name = request()->name;
        $categories->update();
    }
    public function destroy($id)
    {
        $categories = $this->findById($id);
        $categories->delete();
    }


}
