<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
class AuthController extends Controller
{
  public $successStatus = 200;
    //register api
    public function register(Request $request){

        $validator = Validator::make($request->all(), [ 
            'name' => 'required', 
            'email' => 'required|email', 
            'password' => 'required', 
            'c_password' => 'required|same:password', 
        ]);

        if($validator->fails()){
          return response()->json(['error'=>$validator->errors()],401);
        }

      $input = $request->all(); 
        $input['password'] = bcrypt($input['password']); 
        $user = User::create($input); 
        $success['token'] =  $user->createToken('Personal Access Token')->accessToken; 
        $success['name'] =  $user->name;
      return response()->json(['success'=>$success], $this->successStatus);
    } 

    // login api
    public function login(){
      if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
        $user = Auth::user();
        $success['token'] = $user->createToken('LoginToken')->accessToken;
        $success['name'] = $user->name;
      return response()->json(['success'=>$success],$this->successStatus);
      }
      else{
        return response()->json(['error'=>'Unauthorised'],401);
      }
    }

    // user detail api
    public function user(){
      $user = Auth::user();
      return response()->json(['success' => $user], $this->successStatus); 
    }

    // user logout api
    public function logout(){
      $user = Auth::user();
      return response()->json(['success'=>'Successfully Logout!']);
    }
   
}
