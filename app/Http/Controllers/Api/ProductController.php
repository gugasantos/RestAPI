<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class ProductController extends Controller
{
    private $product;

    public function __construct(Product $product)
    {

        $this->product = $product;
    }


    public function index(){

        $products = $this->product->all();

        return response()->json($products);
    }

    public function save(Request $request){

        $data = $request->all();
        $product = $this->product->create($data);
        return response()->json($product);
    }

    public function show($id){


        $products = $this->product->find($id);

        return response()->json($products);
    }
    public function update(Request $request){

        $data = $request->all();

        $products = $this->product->find($data['id']);
        $products->update($data);


        return response()->json($products);
    }
    public function destroy($id){


        $product = $this->product->find($id);
        $product->delete();

        return response()->json(['data' => ['msg' => 'Produto foi removido com sucesso!']]);



    }
}
