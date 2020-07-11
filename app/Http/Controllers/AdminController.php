<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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

        return redirect()->route('show_user')->with('message',$data->name.' Status has been changed successfully');
    }
    
}
