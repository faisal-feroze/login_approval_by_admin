<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\Input;
//use Illuminate\Support\Facades\Input;
use App\User;
use App\Order;
//use App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:user');
    }


    public function index(){
        return view('user.index');
    }

    public function placed(){
        $orders = auth()->user()->orders;
        return view('user.placed-order',['orders'=>$orders,'count'=>1]);
    }

    public function running(){
        $orders = auth()->user()->orders->where('status','order generated');
        return view('user.running-order',['orders'=>$orders,'count'=>1]);
    }

    

    public function create(){
        return view('user.create');
    }

    public function create_bulk(){
        return view('user.create-bulk');
    }



    public function store(Request $request){

        $inputs = $request->all();

        $inputs['status']= 'order generated'; 

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

        for($i=0; $i<$max; $i++){

            $values = explode("\n", $data[$i]);

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
                'order_code' => $values[7],
                'delivery_date' => $delivery_date[$i],
                'status' => 'order generated',
                'bill_received' => 'NO',
                'bill_status' => 'Due',
                'customer_note' => 'Deliver ASAP',
                
            ];

            Order::create($order_data);
       
            
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

    


    
}
