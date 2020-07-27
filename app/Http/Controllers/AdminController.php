<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Role;
use App\Agent;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:superadministrator');
    }


    public function index(){
        $users = User::all();
        return view('admin.index',['users'=>$users]);
    }

    public function show_user(){
        $users = User::all();
        return view('admin.show-users',['users'=>$users,'count'=>1]);
    } 

    public function all_orders(){
        $orders = Order::all()->where('status','order placed');
        $agents = Agent::all()->where('status','active');
        return view('admin.all-orders',['orders'=>$orders,'agents'=>$agents,'count'=>1]);
    } 

    public function picked(){
        $orders = Order::all()->where('status','picked');
        $agents = Agent::all();
        return view('admin.picked-orders',['orders'=>$orders,'agents'=>$agents,'count'=>1]);
    } 


    public function delivered(){
        //$orders = Order::where('status','delivered')->where('bill_status','Due')->get();
        $orders = Order::all()->where('status','delivered');
        $agents = Agent::all();
        return view('admin.delivered-orders',['orders'=>$orders,'agents'=>$agents,'count'=>1]);
    } 


    public function returned(){
        //$orders = Order::where('status','returned')->where('bill_status','Due')->get();
        $orders = Order::all()->where('status','returned');
        $agents = Agent::all();
        return view('admin.returned-orders',['orders'=>$orders,'agents'=>$agents,'count'=>1]);
    } 


    public function order_picked(Request $request, $id){

        $inputs = $request->all();
        $agent = $inputs['agent_id'];
        $order = Order::find($id);
        $order->status = 'picked';
        $order->pickup_agent_id = $agent;
        $order->save();
        return redirect()->route('picked')->with('message',$order->order_code.' has been successfully picked');
    } 


    public function order_delivered(Request $request, $id){

        $inputs = $request->all();
        $agent = $inputs['agent_id'];
        $after_picked = $inputs['after_picked'];
        $order = Order::find($id);
        $order->status = $after_picked;
        $order->delivery_agent_id = $agent;
        $order->save();
        if($after_picked=='delivered'){
            return redirect()->route('delivered')->with('message',$order->order_code.' has been successfully delivered');
        }
        else{
            return redirect()->route('order_returned_admin')->with('message',$order->order_code.' has been returned');
        }
        
    }   


    // public function order_returned(Request $request, $id){
    //     $order = Order::find($id);
    //     $order->status = 'returned';
    //     $order->save();
    //     return redirect()->route('order_returned_admin')->with('message',$order->order_code.' has been returned');
    // }


    public function payment_due(){
        //$orders = Order::all()->where('status','delivered');

        //$users = User::all();
        //$users = User::with('roles')->where('roles.name','=','user')->get();

        $users = User::whereHas(
            'roles', function($q){
                $q->where('name', 'user');
            }
        )->get();

        return view('admin.payment-due',['users'=>$users,'count'=>1]);
    }  


    public function pay_bill(Request $request, $id){
        $user = User::find($id);
        $orders = $user->orders()->whereIn('status',['delivered','returned'])->where('bill_status','Due')->get();
        //dd($orders);
        return view('admin.pay-bill',['orders'=>$orders,'user'=>$user,'count'=>1]);

    }


    public function status(Request $request, $id)
    {
        $data = User::find($id);

        if($data->status==0){ $data->status=1; }

        else{ $data->status=0; }
        
        $data->save();

        return redirect()->route('show_user')->with('message',$data->name.' Status has been changed successfully');
    }

    public function cash_memo(Request $request){

        $company_id = request('user_id');
        $user = User::find($company_id);
        $orders_seleted = request('choose');
        $delivery_charge = request('delivery_charge');
        $max = sizeof($orders_seleted);
        $all_orders = Order::find($orders_seleted);

        //dd($delivery_charge[0]);

        return view('admin.cash-memo',['orders'=>$all_orders,'user'=>$user,'count'=>0,'charges'=>$delivery_charge]);

    }
    
    
}
