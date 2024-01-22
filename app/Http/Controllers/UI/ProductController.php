<?php

namespace App\Http\Controllers\UI;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\OrderDetails;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('product', compact('products'));
    }


    public function cart()
    {
        return view('cart');
    }

    public function addToCart($id)
    {
        $product = Product::findOrFail($id);

        $cart = session()->get('cart', [    ]);

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function update(Request $request)
    {
        if ($request->id && $request->quantity) {
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }

    public function remove(Request $request)
    {
        // dd($request);

        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product removed successfully');
        }
    }
    public function checkout(Request $request)

    {
        $value = session()->get('cart');

        $date = Carbon::now()->format('d-m-Y');


        $order = new Order();
        $order->date = $date;
        $order->save();


        foreach($value as $id => $details){
            // dd($details['price']);
            $orderDetail = new OrderDetails();
            $orderDetail->order_id = $order->id;
            $orderDetail->product_id = $id;
            $orderDetail->name = $details['name'];
            $orderDetail->quantity = $details['quantity'];
            $orderDetail->image = $details['image'];
            $orderDetail->price= $details['price'];
            $orderDetail->save();

        }


        session()->forget('cart');
        return redirect('/ui/product');
        // dd($date);
    }
}







