<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;

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
        return view('user.placed',['orders'=>$orders,'count'=>1]);
    }

    public function create(){
        return view('user.create');
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

    


    
}
