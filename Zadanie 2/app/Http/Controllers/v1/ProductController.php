<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Image;
use App\Models\ParameterProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parameter;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orderBy = '';
        // Start building the base query
        $sub_query_parameter_product = ParameterProduct::query();
        $sub_query_parameter = Parameter::query();
        $query = Product::query();

        $all_query_parameters_temp = $request->all();
        $all_query_parameters = [];

        array_push($all_query_parameters, $all_query_parameters_temp['maxPrice'] ?? 0);

        foreach ($all_query_parameters_temp as $key => $query_parameter) {
            if ($key == 'maxPrice' || $key == 'page') {
            } else {
                array_push($all_query_parameters, $query_parameter);
            }
        }

        // Filter by max price
        if ($request->has('maxPrice')) {
            $maxPrice = (float) $request->input('maxPrice');
            $query->where('price', '<=', $maxPrice);
        }

        // Filter by categories
        $categoryKeys = collect($request->except(['maxPrice', 'order_by']))
            ->filter(function ($value, $key) {
                return $value !== 'all';
            })->values();

        $sub_query_parameter = $sub_query_parameter->whereIn('value', $categoryKeys->values())->get()->pluck('id');

        $sub_query_parameter_product = $sub_query_parameter_product->whereIn('parameter_id', $sub_query_parameter);

        $sub_query_parameter_product = $sub_query_parameter_product
            ->selectRaw('product_id, count(product_id) as count')
            ->groupBy('product_id')
            ->orderBy('count', 'desc')
            ->get();

        $valid_product_ids = [];

        foreach ($sub_query_parameter_product as $product) {
            if ($product->count == count($categoryKeys)) {
                array_push($valid_product_ids, $product->product_id);
            }
        }

        if (count($valid_product_ids) == 0) {
        } else {
            $query = $query->whereIn('id', $valid_product_ids);
        }

        // Order the results
        if ($request->has('order_by')) {
            $orderBy = $request->input('order_by');
            if ($orderBy === 'ascPrice') {
                $query->orderBy('price');
            } elseif ($orderBy === 'dscPrice') {
                $query->orderByDesc('price');
            } // Add more conditions for other sorting options if needed
        }

        // Paginate the results with 20 items per page
        $array = $query->paginate(20);

        $whole_products = [];

        foreach ($array as $index => $element) {

            $image = Image::where("product_id", $element->id)->where("main", true)->first();

            $data = [
                'id' => $element->id,
                'name' => $element->name,
                'description' => $element->description,
                'category' => $element->category,
                'price' => $element->price,
                'image' => decrypt(stream_get_contents($image->link)),
                'created_at' => $element->created_at
            ];

            array_push($whole_products, $data);
        }

        $all_parameters = DB::table('parameters')->get();
        $number_of_parameters =  DB::table('parameters')->distinct()->orderBy('parameter')->get('parameter');

        return view('shop', [
            'array_products' => $whole_products,
            'pagination' => $array,
            'order_by' => $orderBy,
            'all_parameters' => $all_parameters,
            'unique_parameters' => $number_of_parameters,
            'all_query_parameters' => $all_query_parameters,
            'max_price' => $all_query_parameters ? $all_query_parameters[0] : 0
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
        $parameterProducts = ParameterProduct::where('product_id', $id)->get();
        $parameters = [];

        foreach ($parameterProducts as $parameterProduct) {
            $parameter = Parameter::where('id', $parameterProduct->parameter_id)->first();
            array_push($parameters, $parameter);
        }

        $images = Image::where('product_id', $id)->take(2)->get();

        foreach ($images as $image) {
            $image->link = decrypt(stream_get_contents($image->link));
        }

        return view('single-page', [
            'product' => $product,
            'images' => $images,
            'parameters' => $parameters
        ]);
    }

    public function shopFilter()
    {
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