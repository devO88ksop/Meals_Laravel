<?php
namespace App\Repositories;

use App\Models\Admin;
use App\Models\Category;
use GuzzleHttp\Psr7\Request;
use App\Interfaces\AdminInterface;
use Illuminate\Support\Facades\Hash;

class AdminRepository implements AdminInterface{
    public function all()
    {
        return Admin::paginate()->all();

    }
    public function store($request)
    {
        // dd(request()->all());

        // $validated = $request->validate([
        //     'name' => 'required|',
        //     'eamil' => 'required|',
        //     'password' => 'required',
        // ]);

        $admin = new Admin();
        $admin->name=request()->name;
        $admin->email=request()->email;
        $admin->password= bcrypt($request->password);
        $admin->save();
    }
    // public function findById($id){
    //     return Admin::findOrFail($id);

    // }
    // public function update($id ,Request $request)
    // {
    //     $admin = $this->findById($id);
    //     $admin->name = request()->name;
    //     $admin->email=request()->eamil;
    //     $admin->password=bcrypt($request->password);
    //     $admin->update();
    // }
    // public function destroy($id)
    // {
    //     $categories = $this->findById($id);
    //     $categories->delete();
    // }


}
