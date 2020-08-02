<?php

namespace App\Http\Controllers;

use App\Http\Observer\Login;
use App\Http\Observer\Security;
use App\Management;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use SplObjectStorage;
use SplObserver;
use SplSubject;

class LoginController extends Controller 
{
    public function index(){
        return  redirect('login');
    }
    public function signUpSubmit(Request $request){

        $validator = Validator::make($request->all(),[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users,email',
            'city' => 'required',
            'state' => 'required',
            'company' => 'required',
            'password' => 'required|min:8',
            'sec_id' => 'required',
            'sec_answer' => 'required'
        ]);
        if($validator->fails())
            return view('/signup',['errors'=>$this->validationError($validator)]);
        
        $user=User::create([
            "email" => $request->email,
            "password" => $request->password,
            "firstname" => $request->firstname,
            "lastname" =>  $request->lastname,
            "company" =>  $request->company,
            "city" => $request->city,
            "state" =>  $request->state,
            "sec_id" =>  $request->sec_id,
            "sec_answer" => $request->sec_answer,
            "security_status"=>2
        ]);

        return  redirect('newevents');
      
    }
  /*  public function loginSubmit(Request $request){

        $validator = Validator::make($request->all(),[
            'eamil' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);
        if($validator->fails())  view('/login',['errors'=>$this->validationError($validator)]);
        
        $user=User::where('email',$request->email)->first();
  
        if($request->password != $user->password){
            return view('login',['errors'=>'password is incorrent']);
        }
        $request->session()->put('name', $user->firstname);
        $request->session()->put('srno', $user->srno);
        return  redirect('newevents');

    }*/
    public function loginSubmit(Request $request,Login $login){

      
        $login->attach(new Security());
    
        if ($login->init($request->email, $request->password)) {

            $user=User::where('email',$request->email)->first();
            $request->session()->put('name', $user->firstname);
            $request->session()->put('srno', $user->srno);
            return  redirect('/home');

        } else {
            return view('login',['errors'=>$login->getResponse()]);

        }

    }
    public function emailCheck(Request $request){
		
		$validator = Validator::make($request->all(),[
            'email' => 'required|email|exists:users,email'
		]);
		
		if($validator->fails())  
			 return response()->json([
				"error"     =>  true,
				"cause"     =>  $this->validationError($validator)
					]);

        $user=User::where('email',$request->email)->first();
       
        return $this->successResponse($user->question);
    }
    public function forgetpasswordSubmit(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|exists:users,email',
            'ans'=>'required',
            'password'=>'required|min:8',
        ]);
        if($validator->fails())  return view('/forgot',['errors'=>$this->validationError($validator)]);

        $user=User::where('email',$request->email)->first();

        if($user->sec_answer!=$request->ans) return view('/forgot',['errors'=>'Ans is incorrent']);
       
        return redirect('login');

    }
    public function adminSubmit(Request $request){
	
        $validator = Validator::make($request->all(),[
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8',
        ]);
        if($validator->fails()) return view('adminlogin',['errors'=>$this->validationError($validator)]);
        
        $user=Management::where('email',$request->email)->first();
     
        if($request->password != $user->password){
            return view('adminlogin',['errors'=>'password is incorrent']);
        }


        $request->session()->put('name', $user->firstname);
        $request->session()->put('srno', $user->srno);
        return  redirect('adminhomepage');
    }
    public function logout(Request $request){
        $request->session()->flush();
        return redirect('login');
    }
}