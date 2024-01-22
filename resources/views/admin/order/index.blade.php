@extends('admin.layouts.master')
@section('content')
    <div class="main-content overflow-hidden">

        <div class="page-content">
            <div class="container-fluid">

                <table class="table table-success table-striped align-middle table-nowrap mb-0">
                    <thead>
                        <!-- Buttons with Label -->
                        <div class="my-3">
                            <a href="{{ url('admin/products/create') }}">
                                <button type="button" class="btn btn-primary btn-label waves-effect waves-light"><i
                                        class="ri-user-smile-line label-icon align-middle fs-16 me-2"></i> Add</button>
                            </a>
                        </div>
                        <div class="my-3">
                            <a href="{{ url('ui/product') }}">
                                <button type="button" class="btn btn-primary btn-label waves-effect waves-light"><i
                                        class="ri-user-smile-line label-icon align-middle fs-16 me-2"></i>UI List</button>
                            </a>
                        </div>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Date</th>
                            <th scope="col"> Product Name</th>
                            <th scope="col">Price</th>
                            {{-- <th scope="col">Description</th> --}}
                            <th scope="col">Image</th>
                            {{-- <th scope="col">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td scope="row">{{ $order->id }}</td>
                                <td>{{ $order->date }}</td>

                                <td>

                                    {{-- {{ dd($order->OrderDetails) }} --}}
                                    @foreach ($order->OrderDetails as $orderDetail)
                                        {{ $orderDetail?->name }}
                                    @endforeach
                                </td>
                                <td>

                                    {{-- {{ dd($order->OrderDetails) }} --}}
                                    @foreach ($order->OrderDetails as $orderDetail)
                                        {{ $orderDetail?->price }}
                                    @endforeach
                                </td>
                                <td>

                                    {{-- {{ dd($order->OrderDetails) }} --}}
                                    @foreach ($order->OrderDetails as $orderDetail)
                                        {{-- {{ $orderDetail?->image }} --}}

                                        @if ($orderDetail->image == null)
                                            <img src="{{ asset('defaultphoto/default-image.jpg') }}"
                                                style="width: 80px;height: 50px" class="round shadow-sm">
                                        @else
                                            <img src="{{ asset('images/' . $orderDetail->image) }}" style="width: 80px;height: 50px"
                                                class="round shadow-sm">

                                        @endif
                                    @endforeach
                                </td>





                                {{-- <td>
                                    <div class="hstack gap-3 flex-wrap">
                                        <a href="{{ url('admin/orders/' . $order->id . '/edit') }}" href="javascript:void(0);"
                                            class="link-success fs-15"> <i class="ri-edit-2-line"></i>
                                        </a>
                                        <div class="remove">
                                            <form action="{{ url('admin/orders/' . $order->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button style="background-color: transparent; border:none;"
                                                    class="link-danger fs-15">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>

                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr> --}}
                        @endforeach

                    </tbody>

                </table>

            </div>
            <div class="mt-4">
                {{ $orders }}
            </div>
        </div>
    </div>
@endsection
