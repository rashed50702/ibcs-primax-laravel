<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDelivery;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Response;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*getting all orders those are not delivered//1 is for delivered*/
        return Order::where('is_moved', '!=' , 1)->with('customer')->orderBy('order_date', 'asc')->get();
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
        // DB::beginTransaction();

        // try {
        // code here

        //     DB::commit();
        //     // all good
        // } catch (\Exception $e) {
        //     DB::rollback();
        //     // something went wrong
        // }
        try {
            $order = new Order();
            $order->customer_id = $request->customer_id;
            $order->order_date  = Carbon::now();
            $order->save();

            $orderProducts = [];
            foreach ($request->cart_items as $item) {
                    $orderProducts[] = [
                        'order_id' => $order->id,
                        'product_id' => $item['pid'],
                        'quantity' => $item['pqty'],
                        'price' => $item['pprice']
                    ];
            }
            OrderProduct::insert($orderProducts);

            return response()->json(['status' => 'success', 'message' => 'Thank you! Order submitted.'], 201);
        }catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'message' => 'Error', 'errors' => $exception->errors()], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function changeOrderStatus(Request $request)
    {
        try {
            $id = $request->order_id;
            $data = Order::find($id);
            $data->status       = $request->new_status;
            $data->save();            
            return response()->json(['status' => 'success', 'message' => 'Status changed successfully!'], 201);
        }catch (\Exception $exception) {
            return response()->json(['status' => 'error', 'message' => 'Error', 'errors' => $exception->errors()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Order::find($id);
        $data->delete();
        return Response::json(['message' => 'The order deleted successfully!'], 200);
    }

    public function deliveredOrders()
    {
        return OrderDelivery::with('order')->get();
    }
}
