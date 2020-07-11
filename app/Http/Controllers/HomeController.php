<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users = User::all();
        return view('home',['users'=>$users]);
    }

    public function status(Request $request, $id)
    {
        $data = User::find($id);

        if($data->status==0){
            $data->status=1;
        }
        else{
            $data->status=0;
        }
        $data->save();

        //return Redirect::to('home')->with('message',$data->name.' Status has been changed successfully');

        return redirect()->route('home')->with('message',$data->name.' Status has been changed successfully');
    }



    
}
