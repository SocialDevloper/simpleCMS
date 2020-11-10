<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //  for collection filter only even Id records get
        /*$collection = Product::all();
        //echo $collection->count();
        $filtered = $collection->filter(function ($value, $key) {
            return ($value->id % 2 != 0);
        })->where('price', '>', 1000);
        print_r($filtered->toArray());
        exit;*/
        // -------------
        /*$collection = Product::all();
        $filter = $collection->filter(function($value, $key) {
            if ($value['id'] == 16) {
                return true;
            }
        });
         
        print_r($filter->toArray());

        exit();*/
        $products = Product::paginate(5);
        return view('dashboard.products.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.products.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required',
            'product_name' => 'required|unique:products,product_name',
            'price' => 'required|numeric'
        ]);

        $products = new Product;
        $products->category_id = $request->category;
        $products->product_name = $request->product_name;
        $products->price = $request->price;
        $save = $products->save();
        if($save)
        {
            return redirect()->route('products.index')->with('success','Product created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = Product::find($product->id);
        return view('dashboard.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $product = Product::find($product->id);
        $categories = Category::all();

        return view('dashboard.products.edit', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category' => 'required',
            'product_name' => 'required|unique:products,product_name,'.$product->id,
            'price' => 'required|numeric'
        ]);

        $product = Product::find($product->id);
        $product->category_id = $request->category;
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $save = $product->save();
        if($save)
        {
            return redirect()->route('products.index')->with('success','Product updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
