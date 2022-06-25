<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function cart()
    {
        $orderId = session('orderId');
        if (!is_null($orderId)) {
            $order = Order::findOrFail($orderId);
            return view('empty'); // Added to solve session problem
        }
        else { // Added to solve session problem
            $order = Order::findOrFail($orderId); // Added to solve session problem
            return view('cart', compact('order'));
        }
    }

    public function cartConfirm(){

    }

    public function cartOrder()
    {
        $orderId = session('orderId');
        if (is_null($orderId)){
            return redirect()->route('index');
        }
        $order = Order::find($orderId);
        return view('order', compact('order'));
    }


    public function cartAdd($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            $order = Order::create()->id;
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

        if($order->products->contains($productId)){
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            $pivotRow -> count++;
            $pivotRow ->update();
        }else {
            $order->products()->attach($productId);
        }

        return redirect()->route('cart');
    }

    public function cartRemove($productId)
    {
        $orderId = session('orderId');
        if (is_null($orderId)) {
            return redirect()->route('cart');
        }
        $order = Order::find($orderId);


        if ($order->products->contains($productId)) {
            $pivotRow = $order->products()->where('product_id', $productId)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($productId);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
            return redirect()->route('cart');
        }
    }
}
