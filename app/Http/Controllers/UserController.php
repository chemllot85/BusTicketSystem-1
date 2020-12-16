<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seat;
use App\Models\User;
use Auth;
class UserController extends Controller
{
    
    function register(){
        return view('users/register');
    }

    function save(Request $request)
    {
        //input validation
        $validatedData = \Validator::make($request->all(), [
            'firstName' => 'required|min:3|max:100',
            'lastName' => 'required|min:2|max:100',
            'email' => 'required|min:2|max:100|unique:users',
            'password' => 'required|min:2|max:100',
            'gender' => 'required|min:2|max:20',
            'phone' => 'required|min:2|max:20',
        ]);

        //check if there is an error
        if($validatedData->fails()){
            return redirect('/admin_dashboard/Buses/add')->withErrors($validatedData)->withInput();
        }

        $user= new User();
        $user->fname=$request->firstName;
        $user->lname=$request->lastName;
        $user->gender=$request->gender;
        $user->phone=$request->phone;
        $user->email=$request->email;
        $user->password=\Hash::make($request->password);
        $user->save();
        
        return redirect('/');
    }

    function login(){
        return view('users/login');
    }
    
    function handleLogin(Request $request){
        //input validation
        $validatedData = \Validator::make($request->all(), [
            'email' => 'required|min:2|max:100',
            'password' => 'required|min:2|max:100',
        ]);
        //check if there is an error
        if($validatedData->fails()){
            return redirect('/users/login')->withErrors($validatedData)->withInput();
        }
        $cred=array('email'=>$request->email,'password'=>$request->password);
    
        if(Auth::attempt($cred))
        {
            return  redirect('/');
            
        }else
        {
            return redirect('/users/login')->withErrors($validatedData)->withInput();
        }
    }

    //logout
    function logout(){
        Auth::logout();
        return redirect('/');
    }

    
}
