<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use App\Models\Product;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Product::get();
        $stocks = stock::all();
        return view('Pages.stock.index',compact('data','stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $product_id = $request->product_id;
        
        $stock      = Stock::where('product_id', $product_id)->first();
        if ($stock) {
            if($product_id == $stock->product_id) {
                
                $stock->quantity   = $stock->quantity + $request->product_quantity;
                $stock->update();
                // Notification
                $notification = array(
                    'message'    => 'stock Successfull',
                    'alert-type' => 'success',
                );
                return redirect()->back()->with($notification);
            }
        } else {
            $stock_store             = new stock();
            $stock_store->product_id = $product_id;
            $stock_store->quantity   = $request->product_quantity;
            $stock_store->save();
            // Notification
            $notification = array(
                'message'    => 'stock Successfull',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        //
    }
}
