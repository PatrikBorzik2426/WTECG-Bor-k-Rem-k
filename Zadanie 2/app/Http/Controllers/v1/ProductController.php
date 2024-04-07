<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $n = 20;

        $array = DB::table('products')->orderBy('created_at', 'asc')->paginate($n);

        $whole_products = [];

        foreach ($array as $index => $element) {

            $image = Image::where("product_id", $element->id)->where("main", true)->first();

            $data = [
                'id' => $element->id,
                'name' => $element->name,
                'description' => $element->description,
                'category' => $element->category,
                'price' => $element->price,
                'quantity' => $element->quantity,
                'image' => decrypt(stream_get_contents($image->link)),
                'created_at' => $element->created_at
            ];

            array_push($whole_products, $data);
        }

        return view('shop', [
            'array_products' => $whole_products,
            'pagination' => $array
        ]);
    }

    public function searchUpProduct(Request $request)
    {
        $productName = $request->input('search');
        $productName = $productName;

        $products = Product::selectRaw('*, word_similarity(name, \'' . $productName . '\') as sim')
            ->where('name', 'ilike', '%' . $productName . '%')
            ->orderByRaw('sim DESC')
            ->get();

        $products = $products->toArray();

        $jsonArray = [];

        foreach ($products as $index => $element) {
            $jsonArray[$index] = [
                'id' => $element['id'],
                'name' => $element['name'],
                'price' => $element['price'],
            ];
        };

        return response()->json($jsonArray);
    }


    public function singlePage($id)
    {
        $product = Product::find($id);
        $images = Image::where('product_id', $id)->take(2)->get();

        foreach ($images as $image) {
            $image->link = decrypt(stream_get_contents($image->link));
        }

        return view('single-page', [
            'product' => $product,
            'images' => $images
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