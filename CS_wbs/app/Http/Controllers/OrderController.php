<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orders = Order::all();
        return view('backend.order.index', compact(['orders']));
    }

    /**
     * Display the specified resource.
     *
     * @param Order $order
     * @return Response
     */
    public function show(Order $order, $id)
    {
        $oder_detail = DB::table('order_details')->where('order_id', $id)->get();
        //dd($oder_detail);
        return view('backend.order.detail', compact(['oder_detail']));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Order $order
     * @return Response
     */
    public function destroy(Order $order, $id)
    {
        $order = Order::findOrFail($id);
        $order->books()->detach();
        $order->delete();
        return redirect()->route('order.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Order $order
     * @return Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Order $order
     * @return Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

}
