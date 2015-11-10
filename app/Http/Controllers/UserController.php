<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use \DB;
use Request;
use Hash;

class UserController extends Controller
{
    public function show(){

        $users = User::all();

        return view('users.index', compact('users'));
    }

    public function create(){

        return view('users.create');
    }

    public function store(){

        // validate the info, create rules for the inputs
        $rules = array(
            'username' => 'required|unique:users', // make sure the username is not taken already
            'email'    => 'required|email|unique:users', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3', // password can only be alphanumeric and has to be greater than 3 characters
            're-enter' => 'same:password'
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
          return Redirect::to('users/create')
          ->withErrors($validator) // send back all errors to the login form
          ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            $input = Request::all();

            User::create(array(
              'username' => $input['username'],
              'email'    => $input['email'],
              'password' => Hash::make($input['password']),
            ));

            return redirect('users');
        }
    }

    public function delete($id){

        DB::table('users')->where('id', '=', $id)->delete();

        return redirect('users');
    }

    public function update($id, $col){

        $inputs = Request::all();
        $row = DB::table('users')->where('id', '=', $id)->update([$col => $inputs[$col]]);
        
        return redirect('users');
    }
}







