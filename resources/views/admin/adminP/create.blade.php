@extends('admin.layouts.master')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ url('admins') }}" method="POST">
                @csrf
                {{-- @method('POST') --}}
                <div class="d-flex justify-content-center">
                    <div class="row">
                        <div class="">
                            <div class="">
                                <label for="nameInput" class="form-label">Name</label>
                            </div>
                            <div class="">
                                <input name="name" type="text" class="form-control" id="nameInput"
                                    placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <label for="nameInput" class="form-label">Email</label>
                            </div>
                            <div class="">
                                <input name="email" type="email" class="form-control" id="nameInput"
                                    placeholder="Enter your Email">
                            </div>
                        </div>
                        <div class="">
                            <div class="">
                                <label for="nameInput" class="form-label">Password</label>
                            </div>
                            <div class="">
                                <input name="password" type="text" class="form-control" id="nameInput"
                                    placeholder="Enter your name">
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Add Admins</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
