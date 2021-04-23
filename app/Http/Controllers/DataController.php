<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\UserCreation;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class DataController extends Controller
{
    public function getUser() {
        $data = User::orderBy('id','Desc')->get();;
        return response()->json(['result' => $data ]);
    }


    public function addUser(Request $request) {


        $role = $request->role; // to be gotten from the form
        $user_id = $request->user_id;


        $the_role = Role::where('name',$role)->get();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'broker_name' => 'required',
            'member' => 'required',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }


        $data = User::create([
            'name' => $request->name,
            'email' =>  $request->email,
            'phone' => $request->phone,
            'password' =>  Hash::make($request->password),
            'broker_name' =>  $request->broker_name,
            'broker_slug' =>  Str::slug($request->broker_name, '-'),
            'member' => $request->member,
        ]);
        $data->roles()->attach($the_role);

        // creating user and creator
        $uc = UserCreation::create([
            'user_creator_id' => $user_id,
            'user_created_id' =>  $data->id,
            'role' =>  $role,
        ]);

        return response()->json(['result' => 'success' ]);
    }

}
