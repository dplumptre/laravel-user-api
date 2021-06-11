<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class DataController extends Controller
{




    public function getUser() {
        $data = User::orderBy('id','Desc')->get();
        return response()->json(['result' => $data ]);
    }

    public function getAUser(User $user) {
        $data = $user;
        return response()->json(['result' => $data ]);
    }

    public function addUser(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone'=> 'required',
            'email' => 'required|email|unique:users',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $data = User::create([
            'name' => $request->name,
            'email' =>  $request->email,
            'phone' => $request->phone,
            'password' =>  Hash::make($request->password),
        ]);
        return response()->json(['result' => $data ]);
    }


    public function updateUser(Request $request,User $user) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone'=> 'required',
            'email' => 'required|email|unique:users',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $user->name =$request->name;
        $user->email =$request->email;
        $user->phone =$request->phone;
        $user->save();
        return response()->json(['result'=>$user]);
    }



    public function deleteUser(Request $request,User $user) {
        $data = $user->delete();
        return response()->json(['result' => "deleted" ]);
    }



    // comments
    public function getComments() {
        $data = Comment::orderBy('id','Desc')->get();
        return response()->json(['result' => $data ]);
    }
    public function addComment(Request $request) {
        $validator = Validator::make($request->all(), [
            'comment' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $data = Comment::create([
            'comment' => $request->comment,
            'user_id' =>  $request->user_id,
        ]);
        return response()->json(['result' => $data ]);
    }

}
