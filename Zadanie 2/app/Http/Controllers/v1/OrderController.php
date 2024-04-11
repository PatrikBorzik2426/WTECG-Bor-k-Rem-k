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
            'totalPriceInputFinal' => 'required ',
        ], [
            'pickUp.required' => 'Vyberte spôsob doručenia!',
            'pickUpPayment.required' => 'Vyberte spôsob platby!',
        ]);

        if ($request->totalPriceInputFinal > 10) {
            return (view('process-order', [
                'taxLessPrice' => $request->taxLessPriceInput,
                'totalPrice' => $request->totalPriceInputFinal,
                'taxedPrice' => $request->totalTaxedPriceInput,
            ]));
        } else {
            return redirect()->back();
        }
    }

    public function createOrder(Request $request)
    {
        $validator = $request->validate([
            'first_name' => 'required | max:35',
            'last_name' => 'required | max:35',
            'email' => 'required | email | max:254',
            'address' => 'required | max:175',
            'postal_code' => 'required | digits:5',
            'phone' => 'required | max:15',
        ], [
            'first_name.required' => 'Meno je povinné',
            'last_name.required' => 'Priezvisko je povinné',
            'email.required' => 'Email je povinný',
            'email.email' => 'Email musí byť platný',
            'address.required' => 'Adresa je povinná',
            'postal_code.required' => 'PSČ je povinné',
            'postal_code.digits' => 'PSČ musí obsahovať 5 čísel',
            'phone.required' => 'Telefónne číslo je povinné',
        ]);
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