<?php

namespace App\Http\Controllers;

use App\Models\order;
use App\Models\OrderDetail;
use Illuminate\Http\Request; 
use App\Http\Requests\StoreorderRequest;
use App\Http\Requests\UpdateorderRequest;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $details = OrderDetail::join('orders', 'order_details.idorder', '=', 'orders.idorder')
        ->join('menus', 'order_details.idmenu', '=', 'menus.idmenu')
        ->join('pelanggans', 'orders.idpelanggan', '=', 'pelanggans.idpelanggan')
        ->select(['order_details.*', 'orders.*', 'menus.*', 'pelanggans.*'])
        ->get(); // biasanya GET, bukan paginate karena ini detail satu order

    return view('backend.order.detail', ["details" => $details]);
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
    public function store(StoreorderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $idorder)
    {
       $order = order::where('idorder',$idorder)->first();
       return view('backend.order.update',['order'=>$order]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $idorder)
    {  
       
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $idorder)
    {
        $data = $request->validate([
            'bayar'=>'required'
       ]);

       $kembaliS = order::where('idorder',$idorder)->first();
       $kembali = $data['bayar']-$kembaliS->total;

       order::where('idorder', $idorder)->update
        ([
            'bayar' => $data['bayar'],
            'kembali' => $kembali,
            'status' => 1,
       ]);

       return redirect('admin/order');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(order $order)
    {
        //
    }
}
