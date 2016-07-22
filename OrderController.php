<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Order;
use DB;
use Redirect;
use Session;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->get();

        foreach ($orders as $order)
        {
            $order->sum = $order->quantity * $order->price;
        }
        
        return view('orders.index', compact('orders'));
    }

    public function create()
    {
        return view('orders.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'quantity' => 'required|integer',
            'price' => 'required|numeric'
        ]);

//        dd($request->all());
        $input = $request->all();

        Order::create($input);

        Session::flash('flash_message', 'Sukurta sėkmingai!');

        return redirect()->back();
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);

        return view('orders.show', compact('order'));
    }

    public function edit($id)
    {
        $orders = Order::all();

        $total = DB::table('orders')
            ->sum(DB::raw('orders.quantity * orders.price'));

        return view('orders.edit', compact('orders', 'total'));
    }

    public function update($id, Request $request)
    {
        $input = $request->all();

//        dd($input);

        $orders = $input['order'];
        $newItems = data_get($input, 'new', []);

        $ordersIds = array_keys($orders);

        $deleted = Order::whereNotIn('id', $ordersIds)->get();

        foreach ($deleted as $item)
        {
            $item->delete();
        }


        foreach ($orders as $id => $attributes)
        {
            $validator = $this->getValidationFactory()->make($attributes, [
                'name' => 'required',
                'quantity' => 'required|integer',
                'price' => 'required|numeric'
            ]);

            if ($validator->fails()) {
                $this->throwValidationException($request, $validator);
            }
            
            $order = Order::findOrFail($id);
            $order->fill($attributes)->save();
        }

        foreach ($newItems as $attributes)
        {
            $validator = $this->getValidationFactory()->make($attributes, [
                'name' => 'required',
                'quantity' => 'required|integer',
                'price' => 'required|numeric'
            ]);

            if ($validator->fails()) {
                $this->throwValidationException($request, $validator);
            }

            Order::create($attributes);
        }

        Session::flash('flash_message', 'Sėkmingai išsaugota!');

        return redirect('orders');
    }
}
