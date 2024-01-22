<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interfaces\AdminInterface;

class AdminController extends Controller
{

    private $a;

    public function __construct(AdminInterface $adminInterface)
    {
        $this->a = $adminInterface;
    }
    public function index()
    {
        $admin = $this->a->all();
        return view('admin.adminP.index', compact('admin'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.adminP.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->a->store($request);
        return redirect('admins');
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    // private function validationRules()
    // {
    //     return [
    //         'name' => 'required|unique:categories|max:255',
    //         'email' => 'required|email|unique:admins',
    //         'password' => 'required|min:8|confirmed',
    //     ];
    // }
}
