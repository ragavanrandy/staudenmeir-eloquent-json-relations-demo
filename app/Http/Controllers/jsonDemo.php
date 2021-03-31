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
        $users = User::with('orders')->get();
        dd($users[0]);
    }

    public function userOrders($id=null){
        if($id != null){
            $user = User::find($id);
            $user->load('orders');
            dd($user);
        }
        else{
            echo "please provide user id";
        }
    }
}
