@extends('admin.layouts.master')
@section('content')

<div class="main-content overflow-hidden">

    <div class="page-content">
        <div class="container-fluid">

            <table class="table table-success table-striped align-middle table-nowrap mb-0">
                <thead>
                    <!-- Buttons with Label -->
            <div class="my-3">
                <a href="{{ url('/products/create') }}">
                    <button type="button" class="btn btn-primary btn-label waves-effect waves-light"><i class="ri-user-smile-line label-icon align-middle fs-16 me-2"></i> Add</button>
                </a>
            </div>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Category Id</th>
                        <th scope="col">Price</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ( $products as $product )


                    <tr>
                        <td scope="row">{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>
                           {{-- {{$product->category->name}} --}}
                        </td>
                        <td>{{$product->price}} </td>
                        {{-- <td>{{$product->description}} </td> --}}
                        <td>{{ Str::words($product->description, 5)}}</td>

                        <td>
                            @if($product->image == null)
                            <img src="{{ asset('defaultphoto/default-image.jpg') }}" style="width: 80px;height: 50px" class="round shadow-sm">
                            @else
                            <img src="{{ asset('storage/'.$product->image) }}" style="width: 80px;height: 50px" class="round shadow-sm">
                            @endif
                        </td>

                        <td>
                            <div class="hstack gap-3 flex-wrap">
                                <a href="{{ url('products/'.$product->id.'/edit') }}" href="javascript:void(0);"  class="link-success fs-15"><i class="ri-edit-2-line"></i>
                                </a>
                                <div class="remove">
                                    <form action="{{ url('products/'.$product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button style="background-color: transparent; border:none;" class="link-danger fs-15">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                        {{-- <a class="link-danger fs-15 btn">
                                            <i class="ri-delete-bin-line"></i>
                                        </a> --}}
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
