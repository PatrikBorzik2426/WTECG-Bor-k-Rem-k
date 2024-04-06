<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $parameter = $request->input('parameter');

        $n = 20;

        if ($parameter == '0') {
            $array = DB::table('products')->where('category', 0)->orderBy('price', 'asc')->paginate($n);
        } else if ($parameter == '1') {
            $array = DB::table('products')->where('category', 1)->orderBy('price', 'asc')->paginate($n);
        } else if ($parameter == '2') {
            $array = DB::table('products')->where('category', 2)->orderBy('price', 'asc')->paginate($n);
        } else {
            $array = DB::table('products')->orderBy('created_at', 'asc')->paginate($n);
        };

        foreach ($array as $index => $element) {
            $imageUrl = decrypt(stream_get_contents($element->image));
            $element->image = $imageUrl;
            $array[$index] = $element;
        };

        return view('shop', [
            'array_products' => $array,
            'parameter' => $parameter
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
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}