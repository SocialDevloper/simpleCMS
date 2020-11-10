<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* get category id = 1 get product max price record*/
        /*$category = Category::find(1);
        //$products = $category->products->max('price');  // MAX price Only get
        $products = $category->products->sortByDesc('price')->first();  // Max Price record get 
        //dd($products);
        dd($products->toArray());*/

        /* all category ni max price vali product get */
        /*$categories = Category::all();
        
        foreach ($categories as $category) {
            
            $product = $category->products->sortByDesc('price')->first();
            echo "Category ||  Product Name  ||  Price". "<br>";
            echo $category->category_name . " || ". $product['product_name'] . " || ". $product['price'] ." <br><br>"; 
        }
        exit();*/

        $categories = Category::paginate(5);
        return view('dashboard.categories.index', compact('categories'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.create');
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
            'category_name' => 'required|unique:categories,category_name'
        ]);

        $category = new Category;
        $category->category_name = $request->category_name;
        $save = $category->save();
        if($save)
        {
            return redirect()->route('categories.index')->with('success','Category created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category = Category::find($category->id);
        return view('dashboard.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $category = Category::find($category->id);
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'category_name' => 'required|unique:categories,category_name,'.$category->id
        ]);

        $category = Category::find($category->id);
        $category->category_name = $request->category_name;
        $save = $category->save();
        if($save)
        {
            return redirect()->route('categories.index')->with('success','Category updated successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
