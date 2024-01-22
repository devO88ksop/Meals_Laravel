@extends('admin.layouts.master')
<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
            <form action="{{ url('admin/products') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row mb-3">
                    <div class="col-0">
                        <label for="nameInput" class="form-label">Name</label>
                    </div>
                    <div class="col-4">
                        <input name="name" type="text" class="form-control  @error('name') is-invalid @enderror " id="nameInput" placeholder="Enter your name">

                        @error('name')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>

                        @enderror

                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-0">
                        <label for="nameInput"class="form-label">Category Id</label>
                    </div>
                    <div class="col-4">
                        <select name="category_id " class="form-control" id="">
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
                        <input name="price" type="text" class="form-control @error('price') is-invalid @enderror " id="nameInput" placeholder="Enter your price">
                        @error('price')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>

                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-0">
                        <label for="nameInput" class="form-label @error('nameInput') is-invalid @enderror ">Description</label>
                    </div>
                    <div class="col-4">
                        <textarea name="description" class=" form-control @error('description') is-invalid @enderror " id="" cols="30" rows="5"></textarea>
                        @error('description')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>

                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-0">
                        <label for="nameInput" class="form-label">Image</label>
                    </div>
                    <div class="col-4">
                        <input type="file" name="image" class=" form-control @error('image') is-invalid @enderror " id="">
                        @error('image')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>

                        @enderror
                    </div>
                </div>

                <div class="">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
