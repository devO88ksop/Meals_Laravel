<?php

namespace App\Http\Controllers;

use App\Interfaces\CategoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller


{

    private $a;

    public function __construct(CategoryInterface $categoryInterface)
    {
        $this->a=$categoryInterface;

    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $categories= $this->a->all();
        return view('admin.categories.index' ,compact('categories'));

        // $categories=Category::paginate();
        // return view('admin.categories.index' ,compact('categories'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->a->store($request );
        return redirect('admin/categories');
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
        //
        $categories=$this->a->findById($id);
        return view('admin.categories.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->a->update($id);
        return redirect('categories');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $this->a->destroy($id);
        return redirect('categories');

    }
}
