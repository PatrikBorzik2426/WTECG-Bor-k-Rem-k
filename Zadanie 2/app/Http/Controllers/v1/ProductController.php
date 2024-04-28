<?php

namespace App\Http\Controllers\v1;

use App\Http\Controllers\Controller;

use App\Models\Product;
use App\Models\Image;
use App\Models\ParameterProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Parameter;
use Illuminate\Support\Facades\Auth;

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
    public function homePage()
    {

        $apple = Product::where('category', '1')
            ->take(4)
            ->get();
        foreach ($apple as $element) {
            $image = Image::where("product_id", $element->id)->where("main", true)->first();
            $element['image'] = decrypt(stream_get_contents($image->link));
        }
        $android = Product::where('category', '0')
            ->take(4)
            ->get();
        foreach ($android as $element) {
            $image = Image::where("product_id", $element->id)->where("main", true)->first();
            $element['image'] = decrypt(stream_get_contents($image->link));
        }
        $news = Product::orderBy('id', 'desc')
            ->take(2)
            ->get();
        foreach ($news as $element) {
            $image = Image::where("product_id", $element->id)->where("main", true)->first();
            $element['image'] = decrypt(stream_get_contents($image->link));
        }
        return view('home')->with(
            [
                'apple' => $apple,
                'android' => $android,
                'news' => $news
            ]

        );
    }
    public function adminProduct($id)
    {

        $product = Product::find($id);
        $parameterProducts = ParameterProduct::where('product_id', $id)->get();
        $parameters = [];
        $images = [];

        foreach ($parameterProducts as $parameterProduct) {
            $parameter = Parameter::where('id', $parameterProduct->parameter_id)->first();
            array_push($parameters, $parameter);
        }

        $images = Image::where('product_id', $id)->take(2)->get();

        foreach ($images as $image) {
            $image->link = decrypt(stream_get_contents($image->link));
        }

        return view('admin_product_detail')->with(
            [
                'product' => $product,
                'parameters' => $parameters,
                'images' => $images
            ]

        );
    }

    public function admin(Request $request)
    {
        if ($request->input('name') || $product_id = $request->input('id')) {
            $products_name = [];
            $products_id = [];
            $products_category = [];

            $product_name = $request->input('name');

            if ($product_name) {

                $products_name = Product::selectRaw('*, word_similarity(name, \'' . $product_name . '\') as sim')
                    ->where('name', 'ilike', '%' . $product_name . '%')
                    ->orderByRaw('sim DESC')
                    ->get();

                $products_name = $products_name->toArray();
            }

            $product_id = $request->input('id');

            if ($product_id) {
                $products_id = Product::where('id', $product_id)->orderBy('id')->get();
                $products_id = $products_id->toArray();
            }

            $product_category = $request->input('category');

            if ($product_category && $product_category != 'none') {
                $products_category = Product::where('category', $product_category)->get();
                $products_category = $products_category->toArray();
            }

            $products = array_merge($products_name, $products_id, $products_category);
        } else {
            $products = Product::orderBy('id')->get();
        }

        $brands_only = DB::table('parameters')->where('parameter', 'brand')->get();

        $brands_only = $brands_only->pluck('value');

        return view('admin')->with(
            [
                'products' => $products,
                'brands_only' => $brands_only
            ]
        );
    }

    public function deleteProduct($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
        }

        return redirect()->route('admin');
    }

    public function deleteProductMultiple(Request $request)
    {
        $pattern = '/^product-(\d+)$/';

        $all_parameters = $request->all();

        foreach ($all_parameters as $key => $value) {
            if (preg_match($pattern, $key)) {
                $id = preg_replace($pattern, '$1', $key);
                $product = Product::find($id);
                if ($product) {
                    $product->delete();
                }
            }
        }

        return redirect()->route('admin');
    }

    public function updateProduct(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        if ($request->has('product_id')) {

            $images_to_delete = Image::where('product_id', $request->input('product_id'))->get();

            foreach ($images_to_delete as $image) {
                $image->delete();
            }

            if ($request->has('fileInput')) {
                $file_input = $request->file('fileInput');

                foreach ($file_input as $image) {

                    $path = $image->store('images', 'public');

                    try {
                        Image::create([
                            'product_id' => $request->input('product_id'),
                            'link' => encrypt($path),
                            'main' => false
                        ]);
                    } catch (\Exception $e) {
                        dd($e);
                    };
                };
            };

            $regex = '/^image_id-(\d+)$/';

            foreach ($request->all() as $key => $value) {
                if (preg_match($regex, $key)) {
                    try {
                        $image = Image::create([
                            'product_id' => $request->input('product_id'),
                            'link' => encrypt($value),
                            'main' => false
                        ]);
                    } catch (\Exception $e) {
                        dd($e);
                    };
                }
            }

            $product = Product::where('id', $request->input('product_id'));
            $product->update([
                'name' => $request->input('product_name'),
                'description' => $request->input('description'),
                'price' => $request->input('price'),
            ]);

            ParameterProduct::where('product_id', $request->input('product_id'))->delete();

            $parameter_regex_key = '/^parameter-key-(\d+)$/';
            $parameter_regex_value = '/^parameter-value-(\d+)$/';

            $parameter_key = [];
            $parameter_value = [];

            foreach ($request->all() as $key => $value) {
                if (preg_match($parameter_regex_key, $key)) {
                    array_push($parameter_key, $value);
                }
                if (preg_match($parameter_regex_value, $key)) {
                    array_push($parameter_value, $value);
                }
            };

            foreach ($parameter_key as $index => $data) {
                if (Parameter::where('parameter', $data)->where('value', $parameter_value[$index])->exists()) {
                } else {
                    $parameter_data1 = $data;
                    $parameter_data2 = $parameter_value[$index];

                    if ($parameter_data1 == '' || $parameter_data2 == '') {
                        dd('Empty parameter', $parameter_data1, $parameter_data2);
                    }

                    $parameter = Parameter::create([
                        'parameter' => 'piča',
                        'value' => 'kokot'
                    ]);

                    ParameterProduct::create([
                        'product_id' => $request->input('product_id'),
                        'parameter_id' => $parameter->id
                    ]);
                };
            };
        }


        return redirect()->route('admin');
    }
}