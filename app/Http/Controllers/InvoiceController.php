<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Invoice;
use App\Order;
use App\Agent;
use App\User;
use Carbon\Carbon;

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
        
        $created_at = Carbon::now();

        for($i=0; $i<$max; $i++){

            $cash_memos[] = array(
                        'order_id' => $order_id[$i],
                        'memo_no' => $memo_no,
                        'total_amount' => $total_amount[$i],
                        'service_charge' => $service_charge[$i],
                        'net_amount' => $net_amount[$i],
                        'created_at' => $created_at,
                        'updated_at' => $created_at,
                    ); 

            \DB::table('orders')->where('id', $order_id[$i])->update(['bill_received'=>'YES','bill_status'=>'paid']);
                    
        }

        Invoice::insert($cash_memos);
        return redirect()->route('paid_orders')->with('message','Bill has been successfully generated');

    }


    public function view_invoice($memo){

        $invoices = Invoice::all()->where('memo_no','=',$memo);
        $order_id = Invoice::where('memo_no','=',$memo)->pluck('order_id')->first();
        $created_at = Invoice::where('memo_no','=',$memo)->pluck('created_at')->first();
        $company_name = Order::find($order_id)->user->name;
        return view('admin.view-invoice',['invoices'=>$invoices,'count'=>0, 'company_name'=>$company_name,'memo'=>$memo,'created_at'=>$created_at]);

    }
    
    
}
