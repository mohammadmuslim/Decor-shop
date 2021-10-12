<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Shop;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Invoicedetail;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data['shop_data'] = Shop::select('id', 'shop_name')->get();
        $data['products']  = Product::all();
        $data['invoiceList']  = Invoice::all();
        $invoice_no        = invoice::orderBy('id', 'desc')->first();
        if ($invoice_no == null) {
            $firstInvoice        = '0';
            $data['invoiceData'] = $firstInvoice + 1;
        } else {
            $invoiceCheck        = invoice::orderBy('id', 'desc')->first()->invoice_no;
            $data['invoiceData'] = $invoiceCheck + 1;
        }

        return view('Pages.sell.index',$data);
    }

    public function invoiceList()
    {
        //
        $data  = Invoice::all();
        return view('Pages.sell.invoiceList',compact('data'));
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
        try {
           //
        $invoice             = new invoice();
        $invoice->invoice_no = $request->invoice_no;
        $invoice->shop_id    = $request->shop_id;
        $invoice->date       = date('Y-m-d', strtotime($request->date));
        $invoice->status     = '0';
        if ($invoice->save()) {

            for ($i = 0; $i < count($request->product_id); $i++) {
                $invoice_details                = new Invoicedetail();
                $invoice_details->date          = $request->date;
                $invoice_details->invoice_no    = $invoice->id;
                $invoice_details->shop_id       = $request->shop_id;
                $invoice_details->product_id    = $request->product_id[$i];
                $invoice_details->selling_qty   = $request->quantity[$i];
                $invoice_details->unit_price    = $request->price[$i];
                $invoice_details->selling_price = $request->quantity[$i] * $request->price[$i];
                $invoice_details->status        = '0';
                $invoice_details->save();


            }
        } else {

        }
        
        // Notification
        $notification = array(
            'message'    => 'Sell Added Successfully',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
        } catch (\Exception $e) {
            // Notification
        $notification = array(
            'message'    => 'Try again',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    public function singleInvoice($id)
    {
        //
        $invoice = Invoice::with('invoicedetails')->find($id);
        return view('Pages.sell.singleInvoice', compact('invoice'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
