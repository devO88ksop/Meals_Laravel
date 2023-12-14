@extends('admin.layouts.master')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ url('products/'.$products->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row mb-3">
                    <div class="col-0">
                        <label for="nameInput" class="form-label">Name</label>
                    </div>
                    <div class="col-4">
                        <input name="name" type="text" value="{{ $products->name }}" class="form-control" id="nameInput" placeholder="Enter your name">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-0">
                        <label for="nameInput" class="form-label">Category Id</label>
                    </div>
                    <div class="col-4">
                        <select name="" class="form-control" id="">
                             @foreach ($categories as $category )
                                        <option value="{{$category->id}} ">{{$category->name}} </option>
                            @endforeach
                      </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-0">
                        <label for="nameInput" class="form-label">Price</label>
                    </div>
                    <div class="col-4">
                        <input name="price" type="text" value="{{$products->price}}" class="form-control" id="nameInput" placeholder="Enter your price">
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-0">
                        <label for="nameInput" class="form-label">Description</label>
                    </div>
                    <div class="col-4">
                    <textarea name="description" class=" form-control" id="" cols="30" rows="5">{{$products->description}} </textarea>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-0">
                        <label for="nameInput" class="form-label">Image</label>
                    </div>
                    <div class="col-4">
                        <input type="file" name="file" class=" form-control" id="">
                    </div>
                </div>

                <div class="">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
