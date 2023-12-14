<?php 
namespace App\Repositories;

use App\Interfaces\CategoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryInterface{
    public function all()
    {
        return Category::paginate()->all();
        
    }
    public function store()
    {
        // dd(request()->all());
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
