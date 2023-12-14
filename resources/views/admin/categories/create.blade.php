@extends('admin.layouts.master')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ url('categories') }}" method="POST">
                @csrf
                @method('POST')
                    <div class="d-flex justify-content-center">
                        <div class="row">
                            <div class="">
                                <div class="">
                                    <label for="nameInput" class="form-label">Name</label>
                                </div>
                                <div class="">
                                    <input name="name" type="text" class="form-control" id="nameInput" placeholder="Enter your name">
                                </div>
                            </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Add</button>
                        </div>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
