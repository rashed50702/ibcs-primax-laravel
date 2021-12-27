<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\OrderDelivery;
use Illuminate\Console\Command;

class everyMidnight extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'midnight:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will move delivered products from orders table to deliveries table every midnight';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return 0;
        $orders = Order::where('status', 1)->where('is_moved', 0)->get();
        // dd($orders);
        foreach ($orders as $key => $order) {
            if (!OrderDelivery::where('order_id', $order->id)->exists()) {
                $data = new OrderDelivery();
                $data->order_id = $order->id;
                $data->save();

                Order::where('id', $order->id)->update(['is_moved' => 1]);//update order table is_moved to 1
            }
        }
    }
}
