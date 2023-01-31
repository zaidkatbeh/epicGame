<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\userRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
class userController extends Controller
{
    public function store(Request $Request)
    {
        $validator = Validator::make($Request->all(),
        [
            'fullName'=>'required|string',
            'gender'=>'required|string',
            'email'=>'required|string',
            'role'=>'required|string',
            'imageURL'=>'required|string',
            'password'=>'required|string|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json(['result'=>'something missing','errors'=>$validator->messages()]);
        }
        $user=new User;
        $user->fullName=$Request['fullName'];
        $user->gender=$Request['gender'];
        $user->email=$Request['email'];
        $user->role=$Request['role'];
        $user->imageURL=$Request['imageURL'];
        $user->password=$Request['password'];
        $result=$user->save();
        return response()->json([
            'result'=>$result,
        ]);
    }
    public function show(Request $Request)
    {
        $login=$Request->validate([
            'email'=>'required|string',
            'password'=>'required|string',
        ]);
       if(!Auth::attempt($login))
       return response([
        'message'=>'error nigga',
       ]);
       
       $token=Auth::user()->createToken('token')->accessToken;
       return response([
       'user'=>Auth::user(),
       'token'=>$token,
       ]);

    }
}