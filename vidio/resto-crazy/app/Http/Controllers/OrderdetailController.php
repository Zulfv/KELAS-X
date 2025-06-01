<?php

namespace App\Http\Controllers;

use App\Models\orderdetail;
use Illuminate\Http\Request;
use App\Http\Requests\StoreorderdetailRequest;
use App\Http\Requests\UpdateorderdetailRequest;

class OrderdetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = orderdetail::join('orders', 'order_details.idorder', '=', 'orders.idorder')
        ->join('menus', 'order_details.idmenu', '=', 'menus.idmenu')
        ->join('pelanggans', 'orders.idpelanggan', '=', 'pelanggans.idpelanggan')
        ->select('order_details.*', 'orders.*', 'menus.*', 'pelanggans.*')
        ->paginate(3);

   return view('backend.detail.select', ["details" => $details]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
       $tglmulai = $request->tglmulai;
       $tglahkir = $request->tglahkir;

       $details = orderdetail::join('orders', 'order_details.idorder', '=', 'orders.idorder')
        ->join('menus', 'order_details.idmenu', '=', 'menus.idmenu')
        ->join('pelanggans', 'orders.idpelanggan', '=', 'pelanggans.idpelanggan')
        ->whereBetween('orders.tglorder',[$tglmulai,$tglahkir])
        ->select('order_details.*', 'orders.*', 'menus.*', 'pelanggans.*')
        ->paginate(3);

      return view('backend.detail.select', ["details" => $details]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreorderdetailRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(orderdetail $orderdetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(orderdetail $orderdetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateorderdetailRequest $request, orderdetail $orderdetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(orderdetail $orderdetail)
    {
        //
    }
}
