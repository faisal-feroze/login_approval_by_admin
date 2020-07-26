<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Invoice;
use App\Order;
use App\Agent;

class InvoiceController extends Controller
{
    public function __construct()
    {
        // $this->middleware('role:superadministrator');
        $this->middleware('auth');
    }

    public function paid_orders(){
        $orders = Order::all()->where('bill_status','paid');
        $agents = Agent::all();
        return view('admin.paid-orders',['orders'=>$orders,'agents'=>$agents,'count'=>1]);

    }


    public function store(Request $request){

        $inputs = $request->all();
        $order_id = $inputs['order_id'];
        $total_amount = $inputs['total_amount'];
        $service_charge = $inputs['service_charge'];
        $net_amount = $inputs['net_amount'];

        $max = sizeof($order_id);

        $config = ['table'=>'invoices','field'=>'memo_no','length'=>10,'prefix'=>'MEMO-'];
        $memo_no = IdGenerator::generate($config);

        $invoice = new Invoice;
        
        $cash_memos = [];
     

        for($i=0; $i<$max; $i++){

            $cash_memos[] = array(
                        'order_id' => $order_id[$i],
                        'memo_no' => $memo_no,
                        'total_amount' => $total_amount[$i],
                        'service_charge' => $service_charge[$i],
                        'net_amount' => $net_amount[$i],
                    ); 

            \DB::table('orders')->where('id', $order_id[$i])->update(['bill_received'=>'YES','bill_status'=>'paid']);
                    
        }

        Invoice::insert($cash_memos);
        return redirect()->route('paid_orders')->with('message','Bill has been successfully generated');

    }
    
}
