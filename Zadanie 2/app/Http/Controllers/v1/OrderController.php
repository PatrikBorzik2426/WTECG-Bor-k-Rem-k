<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function processOrder(Request $request)
    {
        $validator = $request->validate([
            'pickUp' => 'required',
            'pickUpPayment' => 'required',
            'totalPriceInputFinal' => 'required | min:0',
        ], [
            'pickUp.required' => 'Vyberte spôsob doručenia!',
            'pickUpPayment.required' => 'Vyberte spôsob platby!',
        ]);

        return (view('order', [
            'taxLessPrice' => $request->taxLessPriceInput,
            'totalPrice' => $request->totalPriceInputFinal,
            'taxedPrice' => $request->taxedPriceInput,

        ]));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}