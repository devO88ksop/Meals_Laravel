@extends('admin.layouts.master')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ url('admins/'.$admin->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="nameInput" class="form-label">Name</label>
                    </div>
                    <div class="col-lg-9">
                        <input name="name" type="text" value="{{ $admins->name }}" class="form-control" id="nameInput" placeholder="Enter your name">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="nameInput" class="form-label">Email</label>
                    </div>
                    <div class="col-lg-9">
                        <input name="name" type="text" value="{{ $admins->email }}" class="form-control" id="nameInput" placeholder="Enter your Email">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-lg-3">
                        <label for="nameInput" class="form-label">Password</label>
                    </div>
                    <div class="col-lg-9">
                        <input name="name" type="text" value="{{ $admins->password }}" class="form-control" id="nameInput" placeholder="Enter your Password">
                    </div>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>


