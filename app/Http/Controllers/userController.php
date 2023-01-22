<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\userRequest;
use App\Models\User;
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
        $user=User::where('email',$Request['email'])->get()->first();
        if($user==null)
        return response()->json([
            'states'=>0,
            'error'=>'there is no user with this email'
        ]);
        if($user->password==$Request['password'])
        return response()->json([
            'states'=>1,
            'user'=>$user
        ]);
        else return response()->json([
            'states'=>0,
            'error'=>'password incorrect'
        ]);
    }
}
