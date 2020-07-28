<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\Input;
//use Illuminate\Support\Facades\Input;
use App\User;
use App\Order;
use App\Invoice;
//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:user');
    }


    public function index(){
        $order_placed = auth()->user()->orders->where('status','order placed')->count();
        $order_running = auth()->user()->orders->where('status','picked')->count();
        $order_delivered = auth()->user()->orders->where('status','delivered')->count();
        $order_returned = auth()->user()->orders->where('status','returned')->count();
        $order_completed = auth()->user()->orders->where('bill_status','paid')->count();
        $order_transaction = auth()->user()->orders->where('bill_status','paid')->sum('amount');
        
        return view('user.index',['order_placed'=>$order_placed,'order_running'=>$order_running,'order_delivered'=>$order_delivered,'order_returned'=>$order_returned,'order_completed'=>$order_completed,'order_transaction'=>$order_transaction]);
    }

    public function placed(){
        $orders = auth()->user()->orders->where('status','order placed');
        return view('user.placed-order',['orders'=>$orders,'count'=>1]);
    }

    public function running(){
        $orders = auth()->user()->orders->where('status','picked');
        return view('user.running-order',['orders'=>$orders,'count'=>1]);
    } 

    public function returned(){
        $orders = auth()->user()->orders->where('status','returned');
        return view('user.return-order',['orders'=>$orders,'count'=>1]);
    } 

    public function user_delivered(){
        $orders = auth()->user()->orders->where('status','delivered');
        return view('user.completed-order',['orders'=>$orders,'count'=>1]);
    } 

    public function user_completed(){
        $orders = auth()->user()->orders->where('bill_status','paid');
        return view('user.paid-order',['orders'=>$orders,'count'=>1]);
    } 

    public function edit($id){
        //$order = auth()->user()->orders()->where('id',$id);
        $order = Order::find($id);
        return view('user.edit-order',['order'=>$order]);
    } 


    public function update(Request $request, $id)
    {
        $inputs = $request->all();
        $order = Order::find($id);
        $order->update($inputs);
        session()->flash('message','Order is Updated');
        return redirect()->route('placed');
    }

    public function company_update(Request $request, $id)
    {
        $inputs = $request->all();
        $user = User::find($id);
        $user->update($inputs);
        session()->flash('message','Your Profile has been Updated');
        return redirect()->route('my_company');
    }

    public function company()
    {
        return view('user.company');
    }



    public function create(){
        return view('user.create');
    }

    public function create_bulk(){
        return view('user.create-bulk');
    }



    public function store(Request $request){

        $inputs = $request->all();

        $inputs['status']= 'order placed'; 

        $inputs['bill_received'] = 'NO';

        $inputs['bill_status'] = 'Due';

        

        //dd($inputs);

        auth()->user()->orders()->create($inputs);

        session()->flash('message','New Order is Created');

        return redirect()->route('placed');

        
    }

    public function store_bulk(Request $request){

        //$inputs = $request->all();

        $pickup_date = request('pick_up_date');
        $pickup_address = request('pick_up_address');
        $data = request('all_info');
        $delivery_date = request('delivery_date'); 

        $max = sizeof($data);

       // $values = explode("\n", $data[0]);
 
                //
        $config = ['table'=>'orders','length'=>10,'prefix'=>date('ym')];
        $memo_no = IdGenerator::generate($config);
        //$prcl_no = 'PRCL-'.Haruncpi\LaravelIdGenerator\IdGenerator::generate($config);
      

        for($i=0; $i<$max; $i++){

            $values = explode("\n", $data[$i]);

            // $config = ['table'=>'users','length'=>10,'prefix'=>date('ym')];
            // $prcl_no = 'PRCL-'.IdGenerator::generate($config);
            //$prcl_no = 'PRCL-'.$memo_no;
            //$memo_no++
            //echo $prcl_no

           $lastCompanyId = Order::select('id')->orderBy('id','desc')->first();
           $lastCompanyId=(int)substr($lastCompanyId , -3);
           $lastCompanyId++;
           $prcl_no = 'PRCL-'.$lastCompanyId;

            $order_data = [
                'user_id'=> Auth::user()->id,
                'pick_up_date' => $pickup_date,
                'pick_up_address' => $pickup_address,
                'customer_name' => $values[0],
                'customer_mobile' => $values[1],
                'customer_address' => $values[2],
                'amount' => $values[3],
                'pay_by' => $values[4],
                'product_des' => $values[5],
                'quantity' => $values[6],
                'order_code' => $prcl_no,
                'delivery_date' => $delivery_date[$i],
                'status' => 'order placed',
                'bill_received' => 'NO',
                'bill_status' => 'Due',
                'customer_note' => 'Deliver ASAP',
                
            ];

            Order::create($order_data);
            $memo_no++;
       
            
        }

        // for($j=0; $j<sizeof($values); $j++){
        //     echo $values[$j]; echo "  ";
        //     echo $j; echo "<br>";
        // }

        

        //dd($values);


        // auth()->user()->orders()->create($inputs);
        session()->flash('message','New Order is Created');
        return redirect()->route('placed');

        
    }

    public function view_invoice($memo){

        $invoices = Invoice::all()->where('memo_no','=',$memo);
        $order_id = Invoice::where('memo_no','=',$memo)->pluck('order_id')->first();
        $created_at = Invoice::where('memo_no','=',$memo)->pluck('created_at')->first();
        $company_name = Order::find($order_id)->user->name;
        return view('user.view-invoice',['invoices'=>$invoices,'count'=>0, 'company_name'=>$company_name,'memo'=>$memo,'created_at'=>$created_at]);

    }

    


    
}
