<?php

namespace App\Http\Controllers;

use App\Models\TransOrders;
use Illuminate\Http\Request;
use App\Models\Customers;
use App\Models\TypeofServices;
use App\Models\TransDetails;
use Illuminate\Support\Carbon;

class TransOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Order Transaction";
        $datas = TransOrders::with('customer')->orderBY('id', 'desc')->get();
        return view('trans.index', compact('title', 'datas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $today = Carbon::now()->format('dmY');
        $countDay = TransOrders::whereDate('created_at', now()->toDateString())->count() + 1;
        $runningNumber = str_pad($countDay, 3, '0', STR_PAD_LEFT);
        $title = "Add Transaction";
        $orderCode = "TR-" . $today . "-" . $runningNumber;

        $customers = Customers::orderBy('id', 'desc')->get();
        $services = TypeofServices::orderBy('id', 'desc')->get();

        return view('trans.create', compact('title', 'orderCode', 'customers', 'services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'order_end_date' => 'required'
        ]);
        $transOrder = TransOrders::create([
            'id_customer' => $request->id_customer,
            'order_code' => $request->order_code,
            'order_end_date' => $request->order_end_date,
            'total' => $request->grand_total
        ]);

        foreach ($request->id_product as $key => $idProduct) {
            $id_trans = $transOrder->id;

            TransDetails::create([
                'id_trans_order' => $id_trans,
                'id_product' => $idProduct,
                'qty' => $request->qty[$key],
                'subtotal' => $request->total[$key]
            ]);
        }

        return redirect()->route('trans.index')->with('success', 'Data saved successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
