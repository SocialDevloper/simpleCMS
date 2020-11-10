<?php

namespace App\Http\Controllers;
use DB;
use Gate;

use App\Purchase;
use App\User;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        /* user e jetli product purchase kari ne eme je max amount hoy te display thay */
        /*$purchases = Purchase::all()->groupBy('user_id');
        foreach ($purchases as $purchase) {
          $maxAmount = $purchase->sortByDesc('amount')->first();
          echo "Category || User Name ||  Amount <br>";
           echo $maxAmount->category->category_name . " || ". $maxAmount->user->name ." || ". $maxAmount['amount'];
           echo "<br><br>";

        }
        exit();*/

        // get Purchase details from purchase, user, category, product table
        $purchases = Purchase::with(['user','products', 'category'])->paginate(5);
        return view('dashboard.purchases.index', compact('purchases'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        /* policy PurchasePolicy  for check create login user is Super Admin or not */

        /* -- 1 Method---- */
        /*$response = Gate::inspect('create', Purchase::class);

        if ($response->denied()) {
          return redirect()->back()->with('success',$response->message());
        }*/
        /* ----end 1 Method----*/

        /* ----2 Method -----*/
        // get current logged in user
        $user = Auth::user();
        if ($user->can('create', Purchase::class)) {
          
            $users = User::all();
            $categories = Category::all();
            $products = Product::all();
            return view('dashboard.purchases.create', compact('users', 'categories', 'products'));
        }
        else {
          return redirect()->back()->with('success', 'You are not Authorized to create new purchase');
        }
         /* ----end 2 Method -----*/
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation ad
        $request->validate([
            'userName' => 'required',
            'category' => 'required',
            'product' => 'required',
            'date' => 'required|date'
        ]);

        $purchase = [
            'user_id' => $request->userName,
            'category_id' => $request->category,
            'purchase_date' => date('Y-m-d', strtotime($request->date)),
            'amount' => $request->amount
        ];

        // insert in to Purchase table
        $purchase = Purchase::create($purchase);
        
        if($purchase)
        {
            // add Many to many (product_purchase) table (attach)
            $purchase->products()->attach($request->product);  // array() product multiple select
            return redirect()->route('purchases.index')->with('success','Purchase created successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(Purchase $purchase)
    {
        // get(show) detail select record 
        $purchase = Purchase::with(['user','products', 'category'])->where('id', $purchase->id)->first();
        return view('dashboard.purchases.show', compact('purchase'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchase $purchase)
    {
        /* GATE For edit only login user Role as Super Admin */
        $response = Gate::inspect('edit-purchase');
        //if ($response->allowed()) {  // condition true hoy to allowed other wise denied
        if ($response->denied()) {
            return redirect()->back()->with('success',$response->message());     
        }
        /*--- End Gate---*/

        // edit record fetch details from Purchase table
        $purchase = Purchase::with(['user','products', 'category'])->where('id', $purchase->id)->first();
        $users = User::all();
        $categories = Category::all();

        // get all product select purchase record
        $products = Product::where('category_id', $purchase->category->id)->get();
        
        return view('dashboard.purchases.edit', compact('purchase','categories','users', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchase $purchase)
    {
        /* GATE For update only login user Role as Super Admin */
        $response = Gate::inspect('edit-purchase');
        if ($response->denied()) {
            return redirect()->back()->with('success',$response->message());     
        }
        /*--- End Gate---*/

        $request->validate([
            'userName' => 'required',
            'category' => 'required',
            'product' => 'required',
            'date' => 'required|date'
        ]);

        // update record in Purchase table details

        $purchase = Purchase::find($purchase->id);
        $purchase->user_id = $request->userName;
        $purchase->category_id = $request->category;
        $purchase->purchase_date = date('Y-m-d', strtotime($request->date));
        $purchase->amount = $request->amount;

        if($purchase->save())
        {
            // update data into product_purchase table (sync)
            $purchase->products()->sync($request->product);
    
            return redirect()->route('purchases.index')->with('success','Purchase update successfully.');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchase  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchase $purchase)
    {
        /* GATE For delete only login user Role as Super Admin */
        $response = Gate::inspect('delete-purchase');
        //if ($response->allowed()) {  // condition true hoy to allowed other wise denied
        if ($response->denied()) {
            return redirect()->back()->with('success',$response->message());     
        }
        /*--- End Gate---*/
        $purchase = Purchase::find($purchase->id);

        // first delete from product_purchase table using detach()
        $purchase->products()->detach();

        // delete from Purchase table
        $purchase->delete();

        return redirect()->route('purchases.index')->with('success','Purchase delete successfully.');
    }

    //get product for select category dropdown
    public function getProduct(Request $request)
    {
        if($request->ajax()){
            $products = DB::table('products')->where('category_id',$request->category)->pluck("product_name","id")->all();
            $data = view('dashboard.product-select',compact('products'))->render();
            return response()->json(['options'=>$data]);
        }
    }

    // get selected price amount
    public function getAmount(Request $request)
    {
        if($request->ajax()){
            $price = DB::table('products')->whereIn('id',$request->product)->pluck("price")->all();

            $amount = array_sum($price);    

            return response()->json(['options'=>$amount]);
        }
    }
}
