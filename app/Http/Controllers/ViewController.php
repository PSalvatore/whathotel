<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Mail;
use Auth;
use View;
use DB;

class ViewController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function showHome(){
      if(Auth::check()){
        $user = Auth::user();

        $data = array(
          'greeting' => 'Welcome to WhatHotel!',
          'help' => 'How can I help you?',
          'useremail' => $user->email
        );
      } else {
        $data = array(
          'greeting' => 'Welcome to WhatHotel!',
          'help' => 'How can I help you?',
        );
      }


      return View::make('pages/home');
    }

    public function showSearch(){
      $data = array(
        'greeting' => 'Welcome to WhatHotel!',
        'help' => 'How can I help you?'
      );

      return View::make('pages/search', $data);
    }

    public function showContact(){
      $year = array(
        'Fr' => 'Freshman',
        'So' => 'Sophmore',
        'Jr' => 'Junior',
        'Sr' => 'Senior'
      );

      return View::make('pages/contact', compact('year'));
    }

    public function storeContact(){

        //Get all the data and store it inside Store Variable
         $data = Input::all();

         //Validation rules
         $rules = array (
             //'first_name' => 'required', uncomment if you want to grab this field
             //'email' => 'required|email',  uncomment if you want to grab this field
             //'message' => 'required|min:5'
         );

         //Validate data
         $validator = Validator::make ($data, $rules);

         //If everything is correct than run passes.
         if ($validator -> passes()){

             Mail::send('emails.view', ['data1' => 'please just work!!!!!'], function($message)
             {
                 $message->to('Tuc45398@temple.edu', 'Pat')->subject('feedback form submit');

             });
             // Redirect to page
             return Redirect::to('/')
             ->with('message', 'Your message has been sent. Thank You!');


             //return View::make('contact');
         }else{
             //return contact form with errors
             return Redirect::to('/')
             ->with('error', 'Feedback must contain more than 5 characters. Try Again.');

        }
    }


    public function showAdmin(){

        if(Auth::check() && Auth::user()->email === 'admin@admin.com'){
            $user = Auth::user();
            return view('pages.admin', $user);
        }
        else{
            return view('pages.deny');
        }
    }

    public function showDeny(){

        $data = array(
          'greeting' => 'Welcome to WhatHotel!',
          'help' => 'How can I help you?'
        );

        return View::make('pages/deny', $data);
    }

    public function showLogin()
    {
      // show the form
      return View::make('pages/login');
    }



    public function doLogin()
    {
      // validate the info, create rules for the inputs
      $rules = array(
        'email'    => 'required|email', // make sure the email is an actual email
        'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
      );

      // run the validation rules on the inputs from the form
      $validator = Validator::make(Input::all(), $rules);

      // if the validator fails, redirect back to the form
      if ($validator->fails()) {
        return Redirect::to('login')
        ->withErrors($validator) // send back all errors to the login form
        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
      } else {

        // create our user data for the authentication
        $userdata = array(
          'email'     => Input::get('email'),
          'password'  => Input::get('password')
        );

        // attempt to do the login
        if (Auth::attempt($userdata)) {

          // validation successful!
          // redirect them to the secure section or whatever
          return redirect()->intended('/');

        } else {

          // validation not successful, send back to form
          return Redirect::to('login')->withErrors('Login Failed. The Email or Password is incorrect.');

        }

      }
    }


    public function doLogout()
    {
      Auth::logout(); // log the user out of our application
      return Redirect::to('/')->with('logout', true)->with('message','You have been logged out.');
      // redirect the user to the login screen with alert of success
    }


  }
