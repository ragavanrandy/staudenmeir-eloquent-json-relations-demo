<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use App\Models\Order;

class jsonDemo extends Controller
{
    public function index(){
        // phpinfo(); exit;
        // DB::enableQueryLog();
        // try{
            $users = User::with('orders')->get();
        // }
        // catch(Exception $e){
        //     dd(DB::getQueryLog());
        // }
        dd($users[0]);
        // dd(DB::getQueryLog());
    }

    public function userOrders($id=null){
        if($id != null){
            $user = User::find($id);
            $user->load('orders');
            dd($user);
        }
    }
}
